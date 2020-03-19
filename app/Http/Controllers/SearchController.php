<?php

namespace App\Http\Controllers;

use App\Decision;
use App\News;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use TeamTNT\TNTSearch\TNTSearch;

class SearchController extends Controller
{
    /** @var TNTSearch */
    protected $tnt;

    /** @var array<string> */
    protected $models = [
        'news'     => News::class,
        'decision' => Decision::class,
        'video'    => Video::class,
    ];

    /** @var int */
    protected $resultsPerType = 10;

    public function __construct(TNTSearch $tnt)
    {
        $this->tnt = $tnt;
        $this->tnt->loadConfig(config('scout.tntsearch'));
    }

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

        $this->setSeo([
            'title' => __('search.resultsFor', ['query' => $attributes['query']]),
        ]);

        return view('search.results', [
            'query'   => $attributes['query'],
            'type'    => $attributes['type'],
            'results' => $this->searchIndex($attributes['query'], $attributes['type']),
        ]);
    }

    protected function searchIndex(string $query, string $modelName): array
    {
        $this->tnt->selectIndex(Str::plural($modelName) . '.index');
        $result = $this->tnt->search(strtolower($query), $this->resultsPerType);

        if ($result['hits'] > 0) {
            $order = collect($result['ids'])
                ->map(fn ($id, $index) => "WHEN $id THEN $index")
                ->implode(' ');

            $items = app($this->models[$modelName])
                ->whereIn('id', $result['ids'])
                ->orderByRaw("CASE id $order END")
                ->get();
        }

        return [
            'route' => Str::plural($modelName) . '.show',
            'items' => $items ?? [],
        ];
    }
}
