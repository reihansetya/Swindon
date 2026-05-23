<?php

namespace App\Imports;

use App\Models\Singles;
use App\Models\Albums;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Validation\Rule;

class SingleImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts
{
    private int $rowCount = 0;

    /**
     * Konversi setiap baris Excel menjadi model Singles
     *
     * @param array $row
     * @return Singles
     */
    public function model(array $row)
    {
        $this->rowCount++;

        // Resolve album_id dari album_title
        $albumId = null;
        if (!empty($row['album_title'])) {
            $album = Albums::where('title', $row['album_title'])->first();
            $albumId = $album?->id;
        }

        // Generate slug dari title
        $slug = Str::slug($row['title']);
        $originalSlug = $slug;
        $counter = 1;

        // Pastikan slug unik dengan menambahkan counter jika diperlukan
        while (Singles::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return new Singles([
            'title' => $row['title'],
            'slug' => $slug,
            'album_id' => $albumId,
            'category_id' => 2, // Default single category
            'release_date' => $row['release_date'] ?? null,
            'spotify_url' => $row['spotify_url'] ?? null,
            'description' => $row['description'] ?? null,
            'produced_by' => $row['produced_by'] ?? null,
            'recorded_at' => $row['recorded_at'] ?? null,
        ]);
    }

    /**
     * Aturan validasi untuk setiap baris
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'album_title' => [
                'nullable',
                Rule::exists('albums', 'title')
            ],
            'release_date' => 'nullable|date',
            'spotify_url' => 'nullable|url',
        ];
    }

    /**
     * Pesan validasi kustom dalam bahasa Indonesia
     *
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'title.required' => 'Judul single wajib diisi.',
            'title.max' => 'Judul single maksimal 255 karakter.',
            'album_title.exists' => 'Album dengan judul :input tidak ditemukan.',
            'release_date.date' => 'Format tanggal rilis tidak valid.',
            'spotify_url.url' => 'Format URL Spotify tidak valid.',
        ];
    }

    /**
     * Ukuran batch untuk insert ke database
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 100;
    }

    /**
     * Dapatkan jumlah baris yang diimport
     *
     * @return int
     */
    public function getRowCount(): int
    {
        return $this->rowCount;
    }
}
