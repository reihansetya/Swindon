<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Export class untuk template Excel album
 * Menghasilkan file Excel dengan header kolom untuk import data album
 */
class AlbumTemplateExport implements WithHeadings
{
    /**
     * Definisi header kolom untuk template album
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'title',
            'release_date',
            'spotify_url',
            'description',
            'produced_by',
            'recorded_at'
        ];
    }
}
