<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $page = $this->getCurrentPageNumber($request);

        $items = $this->withCache("video.index.page{$page}", function () {
            return Video::paginatedListing();
        });

        $this->setSeo([
            'title'     => __('content.video.title'),
            'routeName' => 'videos.index',
            'routeArg'  => 'page',
            'page'      => $page,
        ]);

        return view('video.index', [
            'items' => $items,
        ]);
    }

    public function show($slug)
    {
        $item = $this->withCache("videos.show.$slug", function () use ($slug) {
            return Video::where('slug', $slug)->firstOrFail();
        });

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->content,
            'routeName'   => 'videos.show',
            'routeArg'    => 'slug',
            'slug'        => $slug,
        ]);

        return view('video.show', [
            'item' => $item,
        ]);
    }
}
