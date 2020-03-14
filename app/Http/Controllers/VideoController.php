<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public  function index()
    {
        $items = Video::listing();

        return view('video.index', [
            'items' => $items,
        ]);
    }

    public function show($slug)
    {
        $item = Video::where('slug', $slug)->firstOrFail();

        $this->setSeo([
            'title' => $item->title,
            'description' => $item->content,
        ]);

        return view('video.show', [
            'item' => $item,
        ]);
    }
}
