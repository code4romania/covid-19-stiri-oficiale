<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public  function index()
    {
        $items=Video::paginate(10);
        return view('news.index',compact('items'));
    }
    public function show($slug)
    {
        $item=Video::where('slug',slug)->get();
        return view('video.show',compact('$item'));
    }
}
