<?php

namespace App\Http\Controllers;

use App\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function index(Request $request)
    {
        $page = $this->getCurrentPageNumber($request);
        $items = $this->withCache("decisions.index.page$page", function () {
            return Decision::paginatedListing();
        });

        return view('decisions.index', [
            'items' => $items,
        ]);
    }

    public function show($slug)
    {
        $item = $this->withCache("decisions.show.$slug", function () use ($slug) {
            return Decision::where('slug', $slug)->published()->firstOrFail();
        });

        $this->setSeo([
            'title' => $item->title,
            'description' => $item->content,
        ]);

        return view('decisions.show', [
            'item' => $item,
        ]);
    }
}
