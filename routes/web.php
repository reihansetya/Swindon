<?php

use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscographyController;
use App\Http\Controllers\FootageController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\SinglesController;
use App\Models\Albums;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/footage', [FootageController::class, 'index'])->name('footage.index');

Route::get('/biography', function () {
    return view('biography');
});

Route::get('/discography', [DiscographyController::class, 'index'])->name('discography.index');
Route::get('/album/{slug}', [DiscographyController::class, 'albumShow'])->name('album.show');
Route::get('/single/{slug}', [DiscographyController::class, 'singleShow'])->name('single.show');

//auth login
Route::get('/admin', [AuthController::class, 'showLogin'])
    ->name('login');
Route::post('/admin', [AuthController::class, 'login'])->middleware('guest');
Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// === admin page === //
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('auth');

// Album
Route::get('/admin/albums/create', function () {
    return view('admin.create_album');
})
    ->name('admin.albums.create')
    ->middleware('auth');

Route::post('/admin/albums/store', [AlbumsController::class, 'store'])->name('admin.albums.store');

// Halaman Form Edit
Route::get('/admin/albums/{id}/edit', [AlbumsController::class, 'edit'])
    ->name('admin.albums.edit')
    ->middleware('auth');

// Proses Update
Route::put('/admin/albums/{id}', [AlbumsController::class, 'update'])
    ->name('admin.albums.update')
    ->middleware('auth');

// Proses Delete
Route::delete('/admin/albums/{id}', [AlbumsController::class, 'destroy'])
    ->name('admin.albums.destroy')
    ->middleware('auth');

// Single
Route::get('/admin/singles/create', function () {
    $albums = Albums::all();
    return view('admin.create_single', compact('albums'));
})
    ->name('admin.singles.create')
    ->middleware('auth');

Route::post('/admin/singles/store', [SinglesController::class, 'store'])->name('admin.singles.store');

// Halaman Form Edit
Route::get('/admin/singles/{id}/edit', [SinglesController::class, 'edit'])
    ->name('admin.singles.edit')
    ->middleware('auth');

// Proses Update
Route::put('/admin/singles/{id}', [SinglesController::class, 'update'])
    ->name('admin.singles.update')
    ->middleware('auth');

// Proses Delete
Route::delete('/admin/singles/{id}', [SinglesController::class, 'destroy'])
    ->name('admin.singles.destroy')
    ->middleware('auth');

//Picture
Route::get('admin/pictures/create', [PictureController::class, 'index'])
    ->name('admin.pictures.insert')
    ->middleware('auth');

Route::post('/admin/pictures/store', [PictureController::class, 'store'])->name('admin.pictures.store');
