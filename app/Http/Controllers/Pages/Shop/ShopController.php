<?php

namespace App\Http\Controllers\Pages\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\PageContent;
use App\Models\Product;
use App\Models\ProductContent;
use App\Services\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Mollie\Laravel\Facades\Mollie;

class ShopController extends Controller
{
    public function index($locale, $slug, Cart $cart) {
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        $shoppingCart = $cart->get();

        $productContent = ProductContent::where('slug', $slug)->first();

        return view('pages.shop.detail.productDetail', [
            'pages' => PageContent::where('language', $locale)->get(),
            'locale' => $locale,
            'productContent' => $productContent,
            'product' => $productContent->product,
            'cart' => $shoppingCart,
        ]);
    }

    public function addToCart($locale, Request $request, Cart $cart) {
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        $request->validate([
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart->add([
            'id' => $product->id,
            'quantity' => $request->quantity,
            'name' => $product->name,
            'price' => $product->price,
            'model' => $product,
        ]);

        return redirect()->back();
    }

    public function viewForm($locale, Cart $cart) {
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        $shoppingCart = $cart->get();

        return view('pages.shop.order', [
            'locale' => $locale,
            'cart' => $shoppingCart,
        ]);
    }

    public function getOrder($locale, Order $order) {
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        return view('pages.shop.orderComplete', [
            'order' => $order,
        ]);
    }

    public function order($locale, Cart $cart, OrderRequest $request) {
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        $shoppingCart = $cart->get();

        if(!$shoppingCart->hasItems()) {
            return redirect()->route('pages.home');
        }

        $order = Order::create($request->all( ));

        foreach($shoppingCart->items as $item) {
            $order->products()->attach($item->id, [
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // dd(number_format((strval($shoppingCart->getTotal() / 100)), 2));
        $cart->clear();

        // Create Mollie payment
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format((strval($shoppingCart->getTotal() / 100)), 2),
            ],
            "description" => "Order #" . $order->id,
            "redirectUrl" => route('shop.order.status', [$locale, $order->id]),
            "webhookUrl" => config('app.url') . route('webhooks.mollie', [], false),
            "metadata" => [
                "order_id" => $order->id,
            ],
        ]);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function webhook(Request $request) {
        $paymentId = $request->id;
        $payment = Mollie::api()->payments->get($paymentId);

        $order = Order::findOrFail($payment->metadata->order_id);
        $order->status = $payment->status;
        $order->save();
    }
}
