<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Export class untuk template Excel single
 * Menghasilkan file Excel dengan header kolom untuk import data single
 */
class SingleTemplateExport implements WithHeadings
{
    /**
     * Definisi header kolom untuk template single
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'title',
            'album_title',
            'release_date',
            'spotify_url',
            'description',
            'produced_by',
            'recorded_at'
        ];
    }
}
