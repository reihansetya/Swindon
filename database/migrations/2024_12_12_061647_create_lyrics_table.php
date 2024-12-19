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
        Schema::create('lyrics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('lyrics_text');
            $table->uuid('single_id')->nullable();
            $table->string('slug')->default('')->unique();
            $table->timestamps();

            $table->foreign('single_id')->references('id')->on('singles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lyrics');
    }
};
