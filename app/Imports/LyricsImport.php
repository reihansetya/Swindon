<?php

namespace App\Imports;

use App\Models\Lyrics;
use App\Models\Singles;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Validation\Rule;

class LyricsImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts
{
    private int $rowCount = 0;

    /**
     * Konversi setiap baris Excel menjadi model Lyrics
     *
     * @param array $row
     * @return Lyrics
     */
    public function model(array $row)
    {
        $this->rowCount++;

        // Resolve single_id dari single_title
        $single = Singles::where('title', $row['single_title'])->first();

        // Generate slug dari single title dengan suffix -lyrics
        $slug = Str::slug($row['single_title']) . '-lyrics';
        $originalSlug = $slug;
        $counter = 1;

        // Pastikan slug unik dengan menambahkan counter jika diperlukan
        while (Lyrics::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return new Lyrics([
            'single_id' => $single->id,
            'lyrics_text' => $row['lyrics_text'],
            'slug' => $slug,
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
            'single_title' => [
                'required',
                Rule::exists('singles', 'title'),
                // Validasi bahwa single belum memiliki lyrics
                function ($attribute, $value, $fail) {
                    $single = Singles::where('title', $value)->first();
                    if ($single && $single->lyrics()->exists()) {
                        $fail("Single '{$value}' sudah memiliki lyrics.");
                    }
                },
            ],
            'lyrics_text' => 'required',
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
            'single_title.required' => 'Judul single wajib diisi.',
            'single_title.exists' => 'Single dengan judul :input tidak ditemukan.',
            'lyrics_text.required' => 'Teks lyrics wajib diisi.',
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
