<?php

namespace App\Observers;

use App\Models\Singles;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SingleObserver
{
    /**
     * Handle the Singles "deleting" event.
     * Menghapus file gambar fisik ketika single dihapus.
     *
     * @param Singles $single
     * @return void
     */
    public function deleting(Singles $single): void
    {
        // Periksa apakah single memiliki gambar terkait
        if ($single->images) {
            $imagePath = $single->images->image_path;

            // Coba hapus file fisik dari storage
            try {
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                    Log::info("Image file deleted successfully for single: {$single->id}", [
                        'single_id' => $single->id,
                        'image_path' => $imagePath
                    ]);
                } else {
                    Log::warning("Image file not found during single deletion: {$imagePath}", [
                        'single_id' => $single->id,
                        'image_path' => $imagePath
                    ]);
                }
            } catch (\Exception $e) {
                Log::error("Failed to delete image file for single: {$single->id}", [
                    'single_id' => $single->id,
                    'image_path' => $imagePath,
                    'error' => $e->getMessage()
                ]);
            }

            // Database record akan dihapus otomatis oleh cascade constraint
        }
    }
}
