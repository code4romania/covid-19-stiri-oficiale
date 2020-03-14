<?php

namespace App\Providers;

use App\BaseModel;
use App\Observers\ModelObserver;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menusResponse = nova_get_menus();
        View::share('menu', $menusResponse);
        Schema::defaultStringLength(191);
        BaseModel::observe(ModelObserver::class);
    }
}
