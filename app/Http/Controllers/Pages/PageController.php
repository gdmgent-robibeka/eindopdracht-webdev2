<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\Product;
use App\Models\ProductContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class PageController extends Controller
{
    public function view($locale = null, $page = null) {
        // Define default locale
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        // Define default page (=home)
        if(!$page) {
            $pageContent = PageContent::where('page_id', 1)->where('language', $locale)->first();
        } else {
            $pageContent = PageContent::where('language', $locale)->where('slug', $page)->first();
        }

        // Page not found
        if(!$pageContent) abort(404);

        $productContents = ProductContent::where('language', $locale)->get();

        return view('pages.page', [
            'locale' => $locale,
            'content' => $pageContent,
            'pages' => PageContent::where('language', $locale)->get(),
            'productContents' => $productContents,
        ]);
    }
}
