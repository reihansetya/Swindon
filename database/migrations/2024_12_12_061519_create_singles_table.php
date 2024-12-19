<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('singles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->default('')->unique();
            $table->uuid('album_id')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->date('release_date')->nullable();
            $table->string('genre')->nullable();
            $table->string('spotify_url')->nullable();
            $table->string('youtube_embed')->nullable();
            $table->text('description')->nullable();
            $table->string('produced_by')->nullable();
            $table->string('recorded_at')->nullable();
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('singles');
    }
};
