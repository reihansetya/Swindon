<?php

namespace Database\Factories;

use App\Models\Albums;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Albums>
 */
class AlbumsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Albums::class;
    public function definition(): array
    {
        static $counter = 1;
        return [
            'id' => $this->faker->uuid,
            'slug' => Str::slug('Album ' . $counter),
            'title' => 'Album ' . $counter++,
            'release_date' => $this->faker->date(),
            'spotify_url' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'produced_by' => $this->faker->name,
            'recorded_at' => $this->faker->city,
        ];
    }
}
