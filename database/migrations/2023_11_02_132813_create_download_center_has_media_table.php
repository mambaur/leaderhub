<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('download_center_has_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('download_center_id')->constrained('download_centers');
            $table->foreignId('media_id')->constrained('media');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_center_has_media');
    }
};
