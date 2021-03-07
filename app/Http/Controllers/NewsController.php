<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $this->getCurrentPageNumber($request);

        $items = $this->withCache("news.index.page$page", function () {
            return News::paginatedListing();
        });

        $this->setSeo([
            'title'     => __('content.news.title'),
            'routeName' => 'news.index',
            'routeArg'  => 'page',
            'page'      => $page,
        ]);

        return view('news.index', [
            'items' => $items,
        ]);
    }

    public function show(string $slug)
    {
        $item = $this->withCache("news.show.$slug", function () use ($slug) {
            return News::where('slug', $slug)->firstOrFail();
        });

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->content,
            'routeName'   => 'news.show',
            'routeArg'    => 'slug',
            'slug'        => $slug,
        ]);

        return view('news.show', [
            'item' => $item,
        ]);
    }
}
