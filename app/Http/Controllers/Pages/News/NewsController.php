<?php

namespace App\Http\Controllers\Pages\News;

use App\Http\Controllers\Controller;
use App\Models\NewsItemContent;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class NewsController extends Controller
{
    public function index($locale, $slug) {
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        $newsContent = NewsItemContent::where('slug', $slug)->first();

        return view('pages.news.detail.newsDetail', [
            'pages' => PageContent::where('language', $locale)->get(),
            'locale' => $locale,
            'newsContent' => $newsContent,
        ]);
    }

    public function signUp($locale) {
        if(!$locale) $locale = Config::get('app.locale');
        App::setLocale($locale);

        return view('pages.news.newsletter', [
            'pages' => PageContent::where('language', $locale)->get(),
            'locale' => $locale,
        ]);
    }

    public function storeSignUp(Request $request) {
        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email);
        }

        return redirect()->route('pages.home');
    }
}
