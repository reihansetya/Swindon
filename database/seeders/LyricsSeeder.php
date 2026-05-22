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
        $single = Singles::first();

        if (!$single) {
            $this->command->info('No singles found. Please add a single first.');
            return;
        }

        $lyrics = [
            [
                'id' => Str::uuid()->toString(),
                'lyrics_text' => "Kulihat awan menutupi pelangi\nSeakan memudar dan tak kembali\n\nNamun ku tahu esok akan berganti\nSinar mentari kan memeluk bumi\n\nReff:\nTerbanglah tinggi menggapai angan\nJangan menyerah pada kenyataan\nDi ujung jalan yang penuh rintangan\nAda harapan yang menunggumu datang.",
                'single_id' => $single->id,
                'slug' => Str::slug($single->title . '-dummy-lyrics'),
            ],
        ];

        foreach ($lyrics as $lyric) {
            // we use create to trigger the HasUuids model trait
            Lyrics::create($lyric);
        }
    }
}
