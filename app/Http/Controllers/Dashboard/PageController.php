<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageContentRequest;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index() {
        $pages = Page::all();

        return view('dashboard.pages.index', [
            'pages' => $pages,
        ]);
    }

    public function edit(Page $page) {
        return view('dashboard.pages.edit', [
            'page' => $page,
        ]);
    }

    public function postEdit(Page $page, PageRequest $request) {
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->save();

        return redirect()->back();
    }

    public function editContent(Page $page, $language) {
        $content = $page->content()->where('language', $language)->first();

        return view('dashboard.pages.editContent', [
            'page' => $page,
            'content' => $content,
            'activeLocale' => $language,
        ]);
    }

    public function postEditContent(Page $page, $language, PageContentRequest $request) {
        $content = $page->content()->where('language', $language)->first();

        $content->title = $request->title;
        $content->content = $request->content;
        $content->slug = Str::slug($request->title);
        $content->save();

        return redirect()->back();
    }
}
