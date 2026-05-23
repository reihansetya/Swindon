<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Singles;
use App\Models\Lyrics;
use App\Models\Category;
use App\Imports\LyricsImport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;

class LyricsImportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup method untuk membuat categories yang diperlukan
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Buat categories yang diperlukan
        Category::factory()->create(['id' => 1, 'name' => 'Album']);
        Category::factory()->create(['id' => 2, 'name' => 'Single']);
    }

    /**
     * Test bahwa LyricsImport dapat membuat model Lyrics dengan benar
     */
    public function test_lyrics_import_creates_lyrics_with_correct_data(): void
    {
        // Buat single untuk testing
        $single = Singles::factory()->create([
            'title' => 'Test Single',
            'category_id' => 2,
        ]);

        // Data row dari Excel
        $row = [
            'single_title' => 'Test Single',
            'lyrics_text' => 'This is a test lyrics text',
        ];

        // Buat instance import
        $import = new LyricsImport();

        // Panggil method model
        $lyrics = $import->model($row);

        // Verifikasi data
        $this->assertEquals($single->id, $lyrics->single_id);
        $this->assertEquals('This is a test lyrics text', $lyrics->lyrics_text);
        $this->assertEquals('test-single-lyrics', $lyrics->slug);
    }

    /**
     * Test bahwa slug unik dibuat ketika slug sudah ada
     */
    public function test_lyrics_import_generates_unique_slug(): void
    {
        // Buat single untuk testing
        $single = Singles::factory()->create([
            'title' => 'Test Single',
            'category_id' => 2,
        ]);

        // Buat lyrics yang sudah ada dengan slug yang sama
        Lyrics::factory()->create([
            'single_id' => $single->id,
            'slug' => 'test-single-lyrics',
            'lyrics_text' => 'Existing lyrics',
        ]);

        // Hapus lyrics yang baru dibuat untuk test import
        Lyrics::where('slug', 'test-single-lyrics')->delete();

        // Buat single kedua
        $single2 = Singles::factory()->create([
            'title' => 'Test Single',
            'category_id' => 2,
        ]);

        // Buat lyrics pertama
        $lyrics1 = Lyrics::factory()->create([
            'single_id' => $single->id,
            'slug' => 'test-single-lyrics',
            'lyrics_text' => 'First lyrics',
        ]);

        // Data row dari Excel untuk single kedua
        $row = [
            'single_title' => 'Test Single',
            'lyrics_text' => 'Second lyrics text',
        ];

        // Buat instance import
        $import = new LyricsImport();

        // Panggil method model
        $lyrics2 = $import->model($row);

        // Verifikasi slug unik dibuat
        $this->assertNotEquals($lyrics1->slug, $lyrics2->slug);
        $this->assertEquals('test-single-lyrics-1', $lyrics2->slug);
    }

    /**
     * Test validasi bahwa single_title wajib diisi
     */
    public function test_lyrics_import_validates_required_single_title(): void
    {
        $import = new LyricsImport();
        $rules = $import->rules();

        $this->assertArrayHasKey('single_title', $rules);
        $this->assertContains('required', $rules['single_title']);
    }

    /**
     * Test validasi bahwa lyrics_text wajib diisi
     */
    public function test_lyrics_import_validates_required_lyrics_text(): void
    {
        $import = new LyricsImport();
        $rules = $import->rules();

        $this->assertArrayHasKey('lyrics_text', $rules);
        $this->assertEquals('required', $rules['lyrics_text']);
    }

    /**
     * Test bahwa batch size adalah 100
     */
    public function test_lyrics_import_batch_size_is_100(): void
    {
        $import = new LyricsImport();
        $this->assertEquals(100, $import->batchSize());
    }

    /**
     * Test bahwa row count bertambah setiap kali model() dipanggil
     */
    public function test_lyrics_import_tracks_row_count(): void
    {
        // Buat single untuk testing
        $single = Singles::factory()->create([
            'title' => 'Test Single',
            'category_id' => 2,
        ]);

        $import = new LyricsImport();

        // Row count awal harus 0
        $this->assertEquals(0, $import->getRowCount());

        // Panggil model() sekali
        $row = [
            'single_title' => 'Test Single',
            'lyrics_text' => 'Test lyrics',
        ];
        $import->model($row);

        // Row count harus 1
        $this->assertEquals(1, $import->getRowCount());
    }
}
