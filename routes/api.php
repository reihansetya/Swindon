<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

