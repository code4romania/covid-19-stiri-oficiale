<?php

use App\Http\Controllers\DecisionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('cache.headers:public;etag;max_age=3600')->group(function () {
    Route::feeds();
});

Route::get('/cautare', [SearchController::class, 'search'])->name('search')->middleware('throttle:20,1');

Route::middleware('cache.headers:public;etag;max_age=300')->group(function () {
    Route::get('informatii', [NewsController::class, 'index'])->name('news.index');
    Route::get('informatii/{slug}', [NewsController::class, 'show'])->name('news.show');

    Route::get('hotarari', [DecisionController::class, 'index'])->name('decisions.index');
    Route::get('hotarari/{slug}', [DecisionController::class, 'show'])->name('decisions.show');

    Route::get('video', [VideoController::class, 'index'])->name('videos.index');
    // Route::get('video/{slug}', [VideoController::class, 'show'])->name('videos.show');

    Route::get('/', [PageController::class, 'index'])->name('pages.index')->fallback();
    Route::get('{slug}', [PageController::class, 'show'])->name('pages.show')->where('slug', '.*')->fallback();
});
