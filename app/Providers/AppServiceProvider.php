<?php

namespace App\Providers;

use App\Models\Albums;
use App\Models\Singles;
use App\Observers\AlbumObserver;
use App\Observers\SingleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Daftarkan observer untuk menangani penghapusan gambar otomatis
        Albums::observe(AlbumObserver::class);
        Singles::observe(SingleObserver::class);
    }
}
