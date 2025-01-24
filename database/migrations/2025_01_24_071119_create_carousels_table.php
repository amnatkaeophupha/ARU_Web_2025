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
        Schema::create('carousels', function (Blueprint $table) {
            $table->id(); // Automatically creates an auto-incrementing primary key
            $table->string('images'); // Adds an image column (for image paths)
            $table->string('url'); // Adds a url column
            $table->string('files'); // Adds a description column
            $table->integer('order')->default(null); // Adds an order column with a default value of 0
            $table->boolean('active')->default(false); // Adds an active column with a default value of false
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousels');
    }
};
