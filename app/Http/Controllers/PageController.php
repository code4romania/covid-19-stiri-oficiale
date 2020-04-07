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
        $item = $this->withCache("pages.show.$slug", function () use ($slug) {
            return Page::where('slug', $slug)->firstOrFail();
        });

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->content,
            'routeName'   => 'pages.show',
            'routeArg'    => 'slug',
            'slug'        => $slug,
        ]);

        return view('pages.show', [
            'item' => $item,
        ]);
    }
}
