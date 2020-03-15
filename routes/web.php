<?php

use App\Http\Controllers\DecisionController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
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
Route::prefix('/informatii')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('news.show');
});

Route::prefix('/hotarari')->group(function () {
    Route::get('/', [DecisionController::class, 'index'])->name('decisions.index');
    Route::get('/{slug}', [DecisionController::class, 'show'])->name('decisions.show');
});

Route::prefix('/video')->group(function () {
    Route::get('/', [VideoController::class, 'index'])->name('videos.index');
    // Route::get('/{slug}', [VideoController::class, 'show'])->name('videos.show');
});

Route::get('/download/{uuid}', [MediaController::class, 'download'])->name('download');

Route::get('/', [PageController::class, 'index'])->name('pages.index')->fallback();
Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show')->fallback();
