<?php

namespace Database\Seeders;

use App\Models\Albums;
use App\Models\Singles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SinglesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = Albums::all();

        // Singles
        $singles = [
            [
                'id' => Str::uuid()->toString(),
                'album_id' => $albums->where('title', 'Album Satu')->first()->id,
                'slug' => 'single-satu',
                'title' => 'Single Satu',
                'category_id' => 2,
                'release_date' => '2023-01-15',
                'genre' => 'rock',
                'spotify_url' => 'https://spotify.com/single1',
                'youtube_embed' => 'https://youtube.com/embed/single1',
                'description' => 'Deskripsi single satu.',
                'produced_by' => 'Producer Satu',
                'recorded_at' => 'Studio Satu',
            ],
            [
                'id' => Str::uuid()->toString(),
                'album_id' => $albums->where('title', 'Album Dua')->first()->id,
                'slug' => 'single-dua',
                'title' => 'Single Dua',
                'category_id' => 2,
                'release_date' => '2023-02-15',
                'genre' => 'punk',
                'spotify_url' => 'https://spotify.com/single2',
                'youtube_embed' => 'https://youtube.com/embed/single2',
                'description' => 'Deskripsi single dua.',
                'produced_by' => 'Producer Dua',
                'recorded_at' => 'Studio Dua',
            ],
            [
                'id' => Str::uuid()->toString(),
                'album_id' => $albums->where('title', 'Album Satu')->first()->id,
                'slug' => 'single-tiga',
                'title' => 'Single Tiga',
                'category_id' => 2,
                'release_date' => '2023-03-15',
                'genre' => 'pop',
                'spotify_url' => 'https://spotify.com/single3',
                'youtube_embed' => 'https://youtube.com/embed/single3',
                'description' => 'Deskripsi single tiga.',
                'produced_by' => 'Producer Tiga',
                'recorded_at' => 'Studio Tiga',
            ],
        ];

        foreach ($singles as $single) {
            Singles::create($single);
        }
    }
}
