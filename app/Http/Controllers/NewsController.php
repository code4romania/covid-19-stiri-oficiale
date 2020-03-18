<?php

namespace App\Http\Controllers;

use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $items = News::paginatedListing();

        return view('news.index', [
            'items' => $items,
        ]);
    }

    public function show(string $slug)
    {
        $item = News::where('slug', $slug)->published()->firstOrFail();

        $this->setSeo([
            'title' => $item->title,
            'description' => $item->content,
        ]);

        return view('news.show', [
            'item' => $item,
        ]);
    }
}
