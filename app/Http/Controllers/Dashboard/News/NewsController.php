<?php

namespace App\Http\Controllers\Dashboard\News;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index() {
        $newsItems = NewsItem::all();

        return view('dashboard.news.index', [
            'newsItems' => $newsItems,
        ]);
    }

    public function edit(NewsItem $newsItem) {
        return view('dashboard.news.edit', [
            'newsItem' => $newsItem,
        ]);
    }

    public function postEdit(NewsItem $newsItem, Request $request) {
        $newsItem->title = $request->title;
        $newsItem->slug = Str::slug($request->title);
        $newsItem->save();

        return redirect()->back();
    }

    public function editContent(NewsItem $newsItem, $language) {
        $content = $newsItem->content()->where('language', $language)->first();

        return view('dashboard.news.editContent', [
            'newsItem' => $newsItem,
            'content' => $content,
            'activeLocale' => $language,
        ]);
    }

    public function postEditContent(NewsItem $newsItem, $language, Request $request) {
        $content = $newsItem->content()->where('language', $language)->first();

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255',
            'content' => 'required',
            'intro' => 'required',
        ]);

        $content->title = $request->title;
        $content->content = $request->content;
        $content->intro = $request->content;
        $content->slug = Str::slug($request->title);
        $content->save();

        return redirect()->back();
    }
}
