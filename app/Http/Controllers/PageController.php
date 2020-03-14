<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller
{
    public function index()
    {
        return redirect()->route('news.index');
    }

    public function show(string $slug)
    {
        $item = Page::where('slug', $slug)->firstOrFail();

        $this->setSeo([
            'title' => $item->title,
            'description' => $item->content,
        ]);

        return view('pages.show', [
            'item' => $item,
        ]);
    }
}
