<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Export class untuk template Excel lyrics
 * Menghasilkan file Excel dengan header kolom untuk import data lyrics
 */
class LyricsTemplateExport implements WithHeadings
{
    /**
     * Definisi header kolom untuk template lyrics
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'single_title',
            'lyrics_text'
        ];
    }
}
