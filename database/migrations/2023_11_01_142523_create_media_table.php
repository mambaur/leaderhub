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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->text('url')->nullable();
            $table->text('alt')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('caption')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
