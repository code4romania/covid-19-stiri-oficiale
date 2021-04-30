<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $this->setSeo([
            'title'     => __('content.video.title'),
            'routeName' => 'videos.index',
            'routeArg'  => 'page',
            'page'      => $this->getCurrentPageNumber($request),
        ]);

        return view('video.index', [
            'items' => Video::paginatedListing(),
        ]);
    }

    public function show($slug)
    {
        $item = Video::query()
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

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
