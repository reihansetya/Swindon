<?php

namespace Database\Seeders;

use App\Models\Albums;
use App\Models\Images;
use App\Models\Lyrics;
use App\Models\Singles;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $albums = Albums::factory(5)->create();

        // Singles::factory(10)
        //     ->create()
        //     ->each(function ($single) use ($albums) {
        //         $single->album_id = $albums->random()->id;
        //         $single->save();

        //         $single->lyrics()->saveMany(Lyrics::factory(3)->make(['single_id' => $single->id]));
        //         $single->images()->saveMany(Images::factory(2)->make(['single_id' => $single->id, 'type' => 'single']));
        //     });

        // $albums->each(function ($album) {
        //     $album->images()->saveMany(Images::factory(2)->make(['album_id' => $album->id, 'type' => 'album']));
        // });

        // Images::factory(10)->create(['type' => 'general']);

        $this->call([CategorySeeder::class, AlbumsSeeder::class, SinglesSeeder::class]);
    }
}
