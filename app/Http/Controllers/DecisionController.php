<?php

namespace App\Http\Controllers;

use App\Decision;

class DecisionController extends Controller
{
    public function index()
    {
        $items = Decision::listing();

        return view('decisions.index', [
            'items' => $items,
        ]);
    }

    public function show($slug)
    {
        $item = Decision::where('slug', $slug)->published()->firstOrFail();

        $this->setSeo([
            'title' => $item->title,
            'description' => $item->content,
        ]);

        return view('decisions.show', [
            'item' => $item,
        ]);
    }
}
