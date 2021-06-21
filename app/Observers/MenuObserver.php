<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class MenuObserver
{
    /**
     * Handle the "created" event.
     *
     * @param  \OptimistDigital\MenuBuilder\Models\Menu|\OptimistDigital\MenuBuilder\Models\MenuItem  $model
     * @return void
     */
    public function created($model): void
    {
        Cache::tags('menu')->flush();
    }

    /**
     * Handle the "updated" event.
     *
     * @param  \OptimistDigital\MenuBuilder\Models\Menu|\OptimistDigital\MenuBuilder\Models\MenuItem  $model
     * @return void
     */
    public function updated($model): void
    {
        Cache::tags('menu')->flush();
    }

    /**
     * Handle the "deleted" event.
     *
     * @param  \OptimistDigital\MenuBuilder\Models\Menu|\OptimistDigital\MenuBuilder\Models\MenuItem  $model
     * @return void
     */
    public function deleted($model): void
    {
        Cache::tags('menu')->flush();
    }

    /**
     * Handle the "restored" event.
     *
     * @param  \OptimistDigital\MenuBuilder\Models\Menu|\OptimistDigital\MenuBuilder\Models\MenuItem  $model
     * @return void
     */
    public function restored($model): void
    {
        Cache::tags('menu')->flush();
    }

    /**
     * Handle the "force deleted" event.
     *
     * @param  \OptimistDigital\MenuBuilder\Models\Menu|\OptimistDigital\MenuBuilder\Models\MenuItem  $model
     * @return void
     */
    public function forceDeleted($model): void
    {
        Cache::tags('menu')->flush();
    }
}
