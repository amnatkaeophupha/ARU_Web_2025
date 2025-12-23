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
        Schema::create('webaru_admitcycles', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('year', 4);
            $table->string('title',255);
            $table->text('schedules')->nullable();
            $table->text('head_detail')->nullable();
            $table->text('description')->nullable();
            $table->string('files')->nullable();
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
        Schema::dropIfExists('webaru_admitcycles');
    }
};
