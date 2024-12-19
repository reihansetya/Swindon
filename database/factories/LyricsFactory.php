<?php

namespace Database\Factories;

use App\Models\Albums;
use App\Models\Lyrics;
use App\Models\Singles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lyrics>
 */
class LyricsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Lyrics::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'lyrics_text' => $this->faker->paragraph,
            'single_id' => Singles::factory(),
            'slug' => Str::slug($this->faker->sentence(2)),
        ];
    }
}
