<?php

namespace Tests\Unit;

use App\Models\Albums;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlbumsModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that Albums model has images relationship
     *
     * @return void
     */
    public function test_albums_has_images_relationship(): void
    {
        // Create a category first
        $category = Category::create(['name' => 'Test Category']);

        // Create an album
        $album = Albums::factory()->create(['category_id' => $category->id]);

        // Create an image for the album
        $image = Images::factory()->create([
            'album_id' => $album->id,
            'single_id' => null,
            'type' => 'album',
        ]);

        // Refresh the album to load relationships
        $album->refresh();

        // Assert the relationship exists
        $this->assertInstanceOf(Images::class, $album->images);
        $this->assertEquals($image->id, $album->images->id);
        $this->assertEquals($album->id, $album->images->album_id);
    }

    /**
     * Test that Albums model returns null when no image exists
     *
     * @return void
     */
    public function test_albums_images_relationship_returns_null_when_no_image(): void
    {
        // Create a category first
        $category = Category::create(['name' => 'Test Category']);

        // Create an album without an image
        $album = Albums::factory()->create(['category_id' => $category->id]);

        // Assert the relationship returns null
        $this->assertNull($album->images);
    }

    /**
     * Test that Albums model has one-to-one relationship with Images
     *
     * @return void
     */
    public function test_albums_has_one_image_only(): void
    {
        // Create a category first
        $category = Category::create(['name' => 'Test Category']);

        // Create an album
        $album = Albums::factory()->create(['category_id' => $category->id]);

        // Create first image
        $image1 = Images::factory()->create([
            'album_id' => $album->id,
            'single_id' => null,
            'type' => 'album',
        ]);

        // Create second image (this should replace the first in a one-to-one relationship)
        $image2 = Images::factory()->create([
            'album_id' => $album->id,
            'single_id' => null,
            'type' => 'album',
        ]);

        // Refresh the album
        $album->refresh();

        // The relationship should return only one image (the first one found)
        $this->assertInstanceOf(Images::class, $album->images);

        // Note: hasOne returns the first matching record, so we verify it's one of our images
        $this->assertTrue(
            $album->images->id === $image1->id || $album->images->id === $image2->id
        );
    }
}
