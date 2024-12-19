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
        Schema::create('images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('album_id')->nullable();
            $table->uuid('single_id')->nullable();
            $table->string('image_path');
            $table->enum('type', ['general', 'album', 'single'])->default('general');
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->foreign('single_id')->references('id')->on('singles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
