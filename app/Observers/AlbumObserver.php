<?php

namespace App\Observers;

use App\Models\Albums;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AlbumObserver
{
    /**
     * Handle the Albums "deleting" event.
     * Menghapus file gambar fisik ketika album dihapus.
     *
     * @param \App\Models\Albums $album
     * @return void
     */
    public function deleting(Albums $album): void
    {
        // Periksa apakah album memiliki gambar terkait
        if ($album->images) {
            $imagePath = $album->images->image_path;

            // Coba hapus file fisik dari storage
            try {
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                    Log::info("Image file deleted successfully: {$imagePath}");
                } else {
                    Log::warning("Image file not found during album deletion: {$imagePath}");
                }
            } catch (\Exception $e) {
                Log::error("Failed to delete image file during album deletion: {$imagePath}", [
                    'error' => $e->getMessage(),
                    'album_id' => $album->id
                ]);
            }

            // Database record akan dihapus otomatis oleh cascade constraint
        }
    }
}
