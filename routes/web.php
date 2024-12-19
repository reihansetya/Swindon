<?php

use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\DiscographyController;
use App\Http\Controllers\SinglesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/footage', function () {
    return view('footage');
});

Route::get('/biography', function () {
    return view('biography');
});

Route::get('/discography', [DiscographyController::class, 'index'])->name('discography.index');

Route::get('/album/{slug}', [AlbumsController::class, 'show'])->name('album.show');
Route::get('/single/{slug}', [SinglesController::class, 'show'])->name('single.show');
