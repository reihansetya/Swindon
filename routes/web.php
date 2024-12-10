<?php

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
