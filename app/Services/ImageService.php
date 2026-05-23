<?php

namespace App\Services;

use App\Models\Images;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageService
{
    /**
     * Menyimpan gambar yang diunggah dan membuat/memperbarui record database
     *
     * @param UploadedFile $file File gambar yang diunggah
     * @param string $parentId UUID dari parent (album atau single)
     * @param string $type 'album' atau 'single'
     * @param string|null $relatedId Optional related ID (album_id untuk singles)
     * @return Images Model Image yang dibuat atau diperbarui
     * @throws \Exception Jika penyimpanan file gagal
     */
    public function storeImage(
        UploadedFile $file,
        string $parentId,
        string $type,
        ?string $relatedId = null
    ): Images {
        try {
            // Hapus gambar lama jika ada
            $parentType = $type === 'album' ? 'album_id' : 'single_id';
            $this->deleteOldImage($parentId, $parentType);

            // Simpan file ke storage disk public
            $path = Storage::disk('public')->put('images', $file);

            if (!$path) {
                throw new \Exception('Gagal menyimpan file gambar ke storage');
            }

            // Siapkan data untuk updateOrCreate
            $whereConditions = [$parentType => $parentId];
            $updateData = [
                'image_path' => $path,
                'type' => $type,
            ];

            // Tambahkan related_id jika ada (untuk singles yang memiliki album_id)
            if ($relatedId && $type === 'single') {
                $updateData['album_id'] = $relatedId;
            }

            // Buat atau perbarui record database menggunakan updateOrCreate
            $image = Images::updateOrCreate($whereConditions, $updateData);

            Log::info("Gambar berhasil disimpan untuk {$type}", [
                'parent_id' => $parentId,
                'image_path' => $path,
            ]);

            return $image;
        } catch (\Exception $e) {
            Log::error("Gagal menyimpan gambar untuk {$type}", [
                'parent_id' => $parentId,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    /**
     * Menghapus record gambar dan file fisiknya
     *
     * @param Images $image Model gambar yang akan dihapus
     * @return bool Status keberhasilan
     */
    public function deleteImage(Images $image): bool
    {
        try {
            $imagePath = $image->image_path;

            // Hapus file fisik jika ada
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
                Log::info("File gambar berhasil dihapus", ['path' => $imagePath]);
            } else {
                Log::warning("File gambar tidak ditemukan saat penghapusan", ['path' => $imagePath]);
            }

            // Hapus record database
            $deleted = $image->delete();

            if ($deleted) {
                Log::info("Record gambar berhasil dihapus dari database", ['image_id' => $image->id]);
            }

            return $deleted;
        } catch (\Exception $e) {
            Log::error("Gagal menghapus gambar", [
                'image_id' => $image->id,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Menghapus gambar lama saat penggantian dengan gambar baru
     *
     * @param string $parentId UUID dari parent (album atau single)
     * @param string $parentType 'album_id' atau 'single_id'
     * @return void
     */
    private function deleteOldImage(string $parentId, string $parentType): void
    {
        try {
            // Cari gambar lama berdasarkan parent ID
            $oldImage = Images::where($parentType, $parentId)->first();

            if ($oldImage) {
                $oldPath = $oldImage->image_path;

                // Hapus file fisik jika ada
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                    Log::info("Gambar lama berhasil dihapus", ['path' => $oldPath]);
                } else {
                    Log::warning("File gambar lama tidak ditemukan", ['path' => $oldPath]);
                }
            }
        } catch (\Exception $e) {
            Log::warning("Gagal menghapus gambar lama", [
                'parent_id' => $parentId,
                'parent_type' => $parentType,
                'error' => $e->getMessage(),
            ]);
            // Tidak throw exception karena ini tidak boleh menghentikan proses upload gambar baru
        }
    }
}
