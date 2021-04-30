<?php

namespace App\Http\Controllers;

use App\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function index(Request $request)
    {
        $this->setSeo([
            'title'     => __('content.decision.title'),
            'routeName' => 'decisions.index',
            'routeArg'  => 'page',
            'page'      => $this->getCurrentPageNumber($request),
        ]);

        return view('decisions.index', [
            'items' => Decision::paginatedListing(),
        ]);
    }

    public function show($slug)
    {
        $item = Decision::query()
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->content,
            'routeName'   => 'decisions.show',
            'routeArg'    => 'slug',
            'slug'        => $slug,
        ]);

        return view('decisions.show', [
            'item' => $item,
        ]);
    }
}
