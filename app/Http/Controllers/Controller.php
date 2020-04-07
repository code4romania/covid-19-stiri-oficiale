<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSeo(array $params = []): void
    {
        $defaults = [
            'title'       => '',
            'description' => '',
            'routeName'   => '',
            'routeArg'    => '',
        ];

        $params = array_merge($defaults, $params);

        $page = $page ?? 1;

        extract($params);

        $title = trim($title);
        if (!empty($title)) {
            if ($page > 1) {
                $title .= ' - ' . __('pagination.page', compact('page'));
            }

            SEOTools::setTitle($title);
        }

        $description = Str::limit(strip_tags($description), 170);
        if (!empty($description)) {
            SEOTools::setDescription($description);
        }

        if (!empty($routeName) && !empty($routeArg) && isset($$routeArg)) {
            $routeArg = ($routeArg !== 'page' || $page > 1) ? compact($routeArg) : [];

            SEOTools::setCanonical(route($routeName, $routeArg));
        }
    }

    protected function withCache(string $key, Closure $callback)
    {
        return Cache::remember($key, config('cache.ttl'), $callback);
    }

    protected function getCurrentPageNumber(Request $request): int
    {
        return abs($request->get('page')) ?: 1;
    }
}
