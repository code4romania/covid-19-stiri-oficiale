<?php

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

Route::prefix('/news')->group(function () {
    Route::view('/', 'news.index')->name('news.index');
    Route::view('/{slug}', 'news.show')->name('news.show');
});

Route::prefix('/hotarari')->group(function () {
    Route::view('/', 'legal.index')->name('legal.index');
    Route::view('/{slug}', 'legal.show')->name('legal.show');
});

Route::prefix('/video')->group(function () {
    Route::view('/', 'video.index')->name('video.index');
    Route::view('/{slug}', 'video.show')->name('video.show');
});

// Route::view('/', 'pages.index')->name('pages.index');
Route::get('/', function () {
    return redirect()->route('news.index');
})->name('pages.index');

Route::view('/{slug}', 'pages.show')->name('pages.show');
