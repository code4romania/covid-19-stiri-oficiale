<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data=News::paginate(10);
        return view('news.index',compact('data'));
    }

    public function show($slug)
    {
        $data=News::where('slug',$slug);
        return view('news.show',compact('data'));
    }
}
