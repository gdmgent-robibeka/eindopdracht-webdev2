<?php

namespace App\Http\Controllers\Pages\Shop;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\Product;
use App\Models\ProductContent;
use App\Services\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

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
}
