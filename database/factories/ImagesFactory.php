<?php

namespace Database\Factories;

use App\Models\Albums;
use App\Models\Images;
use App\Models\Singles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Images::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'album_id' => $this->faker->boolean(50) ? Albums::factory() : null,
            'single_id' => $this->faker->boolean(50) ? Singles::factory() : null,
            'image_path' => $this->faker->imageUrl(640, 480, 'images', true),
            'type' => $this->faker->randomElement(['general', 'album', 'single']),
        ];
    }
}
