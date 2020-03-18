<?php

namespace App\Http\Controllers;

use App\BaseModel;
use App\Decision;
use App\News;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use TeamTNT\TNTSearch\TNTSearch;

class SearchController extends Controller
{
    /** @var TNTSearch */
    protected $tnt;

    /** @var array<BaseModel> */
    protected $models = [
        News::class,
        Decision::class,
        Video::class,
    ];

    /** @var int */
    protected $resultsPerType = 5;

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
        ]);

        $results = collect($this->models)
            ->map(fn ($model) => $this->searchIndex($attributes['query'], $model));

        $this->setSeo([
            'title' => __('search.resultsFor', ['query' => $attributes['query']]),
        ]);

        return view('search.results', [
            'query'   => $attributes['query'],
            'results' => $results,
        ]);
    }

    protected function searchIndex(string $query, string $model): array
    {
        $modelName = strtolower(str_replace('App\\', '', $model));

        $this->tnt->selectIndex(Str::plural($modelName) . '.index');
        $result = $this->tnt->search(strtolower($query), $this->resultsPerType);

        if ($result['hits'] > 0) {
            $order = collect($result['ids'])
                ->map(fn ($id, $index) => "WHEN $id THEN $index")
                ->implode(' ');

            $items = app($model)
                ->whereIn('id', $result['ids'])
                ->orderByRaw("CASE id $order END")
                ->get();
        }

        return [
            'model' => $modelName,
            'route' => Str::plural($modelName) . '.show',
            'items' => $items ?? [],
        ];
    }
}
