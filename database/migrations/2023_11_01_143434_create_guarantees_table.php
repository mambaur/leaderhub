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
        Schema::create('guarantees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index()->nullable();
            $table->string('serial_number')->index()->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('period')->nullable();
            $table->date('date')->nullable();
            $table->date('expired_date')->nullable();
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
        Schema::dropIfExists('guarantees');
    }
};
