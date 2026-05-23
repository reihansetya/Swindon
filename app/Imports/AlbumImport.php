<?php

namespace App\Imports;

use App\Models\Albums;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class AlbumImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts
{
    private int $rowCount = 0;

    /**
     * Konversi setiap baris Excel menjadi model Albums
     *
     * @param array $row
     * @return Albums
     */
    public function model(array $row)
    {
        $this->rowCount++;

        // Generate slug dari title
        $slug = Str::slug($row['title']);
        $originalSlug = $slug;
        $counter = 1;

        // Pastikan slug unik dengan menambahkan counter jika diperlukan
        while (Albums::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return new Albums([
            'title' => $row['title'],
            'slug' => $slug,
            'category_id' => 1, // Default album category
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
            'release_date' => 'nullable|date',
            'spotify_url' => 'nullable|url',
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
