<?php

namespace App\Http\Controllers;

use App\Decision;
use App\Helpers\Normalize;
use App\News;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SearchController extends Controller
{
    /** @var array<string> */
    protected $models = [
        'news'     => News::class,
        'decision' => Decision::class,
        'video'    => Video::class,
    ];

    /** @var int */
    protected $resultsPerType = 10;

    /**
     * Display the search results.
     *
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {
        $attributes = $request->validate([
            'query' => ['required', 'string', 'min:3'],
            'type'  => ['string', Rule::in(array_keys($this->models))],
        ]);

        $attributes['type'] ??= 'news';

        $this->setSeo([
            'title' => __('search.resultsFor', ['query' => $attributes['query']]),
        ]);

        return view('search.results', [
            'query'   => $attributes['query'],
            'type'    => $attributes['type'],
            'route'   => Str::plural($attributes['type']) . '.show',
            'items'   => $this->getResultsFor($attributes['query'], $attributes['type']),
        ]);
    }

    protected function getResultsFor(string $query, string $modelName): LengthAwarePaginator
    {
        return app($this->models[$modelName])
            ->search(Normalize::string($query))
            ->paginate()
            ->appends(['type' => $modelName]);
    }
}
