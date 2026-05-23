<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FootageImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🖼️  Seeding footage images...');

        // Delete existing general images first
        Images::where('type', 'general')->delete();

        // Create general images (for footage page)
        $generalImages = [
            'images/footage-1.jpg',
            'images/footage-2.jpg',
            'images/footage-3.jpg',
            'images/band-live-1.jpg',
            'images/band-live-2.jpg',
            'images/band-studio-1.jpg',
            'images/band-studio-2.jpg',
            'images/band-rehearsal-1.jpg',
            'images/concert-crowd-1.jpg',
            'images/backstage-1.jpg',
        ];

        foreach ($generalImages as $imagePath) {
            Images::create([
                'id' => Str::uuid()->toString(),
                'album_id' => null,
                'single_id' => null,
                'image_path' => $imagePath,
                'type' => 'general',
            ]);
        }

        $this->command->info('✓ Created ' . count($generalImages) . ' general images');
        $this->command->info('🎉 Footage images seeding completed!');
    }
}
