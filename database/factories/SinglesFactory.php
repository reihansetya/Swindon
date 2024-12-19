<?php

namespace Database\Factories;

use App\Models\Albums;
use App\Models\Singles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Singles>
 */
class SinglesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Singles::class;
    public function definition(): array
    {
        static $counter = 1;
        return [
            'id' => $this->faker->uuid,
            'album_id' => null, // Will be set in the seeder
            'slug' => Str::slug('Single ' . $counter),
            'title' => 'Single ' . $counter++,
            'release_date' => $this->faker->date(),
            'genre' => $this->faker->randomElement(['rock', 'punk', 'pop']),
            'spotify_url' => $this->faker->url,
            'youtube_embed' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'produced_by' => $this->faker->name,
            'recorded_at' => $this->faker->city,
        ];
    }
}
