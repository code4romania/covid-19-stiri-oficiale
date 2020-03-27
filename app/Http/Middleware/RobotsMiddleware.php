<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Spatie\RobotsMiddleware\RobotsMiddleware as BaseRobotsMiddleware;

class RobotsMiddleware extends BaseRobotsMiddleware
{
    /**
     * @return string|bool
     */
    protected function shouldIndex(Request $request)
    {
        return !is_null($request->route()) && $request->route()->getName() !== 'search';
    }
}
