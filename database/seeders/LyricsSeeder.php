<?php

namespace Database\Seeders;

use App\Models\Lyrics;
use App\Models\Singles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LyricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $singles = Singles::all();

        $lyrics = [
            [
                'id' => Str::uuid()->toString(),
                'lyrics_text' => 'Lyrics for Single 1 lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'single_id' => $singles->where('title', 'Single Satu')->first()->id,
                'slug' => 'single-1-lyrics',
            ],
            [
                'id' => Str::uuid()->toString(),
                'lyrics_text' => 'Lyrics for Single 2 dloelorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'single_id' => $singles->where('title', 'Single Dua')->first()->id,
                'slug' => 'single-2-lyrics',
            ],
            [
                'id' => Str::uuid()->toString(),
                'lyrics_text' => 'Lyrics for Single 3 wafecdsdloelorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'single_id' => $singles->where('title', 'Single Tiga')->first()->id,
                'slug' => 'single-3-lyrics',
            ],
        ];

        foreach ($lyrics as $lyric) {
            Lyrics::create($lyric);
        }
    }
}
