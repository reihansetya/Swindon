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
        Schema::create('albums', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->default('')->unique();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->date('release_date')->nullable();
            $table->string('spotify_url')->nullable();
            $table->text('description')->nullable();
            $table->string('produced_by')->nullable();
            $table->string('recorded_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
