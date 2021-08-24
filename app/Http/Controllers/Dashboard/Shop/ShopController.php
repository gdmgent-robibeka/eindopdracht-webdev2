<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('dashboard.shop.index', [
            'products' => $products,
        ]);
    }

    public function edit(Product $product) {
        return view('dashboard.shop.edit', [
            'product' => $product,
        ]);
    }

    public function postEdit(Product $product, ProductRequest $request) {
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->save();

        return redirect()->back();
    }

    public function editContent(Product $product, $language) {
        $content = $product->content()->where('language', $language)->first();

        return view('dashboard.shop.editContent', [
            'product' => $product,
            'content' => $content,
            'activeLocale' => $language,
        ]);
    }

    public function postEditContent(Product $product, $language, Request $request) {
        $content = $product->content()->where('language', $language)->first();

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255',
            'description' => 'required',
        ]);

        $content->name = $request->name;
        $content->description = $request->description;
        $content->slug = Str::slug($request->name);
        $content->save();

        return redirect()->back();
    }
}
