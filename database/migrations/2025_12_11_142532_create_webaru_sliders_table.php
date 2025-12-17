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
        Schema::create('webaru_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('images')->nullable(); // Images of the slider
            $table->string('topic')->nullable();
            $table->string('title')->nullable();
            $table->string('link_url')->nullable();
            $table->string('status')->default(0); // Status of the slider
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
        Schema::dropIfExists('webaru_sliders');
    }
};
