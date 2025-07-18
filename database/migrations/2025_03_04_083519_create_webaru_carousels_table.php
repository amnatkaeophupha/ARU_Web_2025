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
        Schema::create('webaru_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('images')->nullable(); // Images of the carousel
            $table->string('image_url')->nullable();
            $table->string('status')->default(0); // Status of the carousel
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webaru_carousels');
    }
};
