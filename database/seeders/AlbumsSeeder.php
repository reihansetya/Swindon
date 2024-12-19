<?php

namespace Database\Seeders;

use App\Models\Albums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Albums
        $albums = [
            [
                'id' => Str::uuid()->toString(),
                'slug' => 'album-satu',
                'title' => 'Album Satu',
                'category_id' => 1,
                'release_date' => '2023-01-01',
                'spotify_url' => 'https://spotify.com/album1',
                'description' => 'Deskripsi album satu.',
                'produced_by' => 'Producer Satu',
                'recorded_at' => 'Studio Satu',
            ],
            [
                'id' => Str::uuid()->toString(),
                'slug' => 'album-dua',
                'title' => 'Album Dua',
                'category_id' => 1,
                'release_date' => '2023-02-01',
                'spotify_url' => 'https://spotify.com/album2',
                'description' => 'Deskripsi album dua.',
                'produced_by' => 'Producer Dua',
                'recorded_at' => 'Studio Dua',
            ],
        ];

        foreach ($albums as $album) {
            Albums::create($album);
        }
    }
}
