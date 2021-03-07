<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $this->setSeo([
            'title'     => __('content.news.title'),
            'routeName' => 'news.index',
            'routeArg'  => 'page',
            'page'      => $this->getCurrentPageNumber($request),
        ]);

        return view('news.index', [
            'items' => News::paginatedListing(),
        ]);
    }

    public function show(string $slug)
    {
        $item = News::where('slug', $slug)->firstOrFail();

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
