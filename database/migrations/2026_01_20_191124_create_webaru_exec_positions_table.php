<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webaru_exec_positions', function (Blueprint $table) {
            $table->id();

            // ชื่อตำแหน่ง
            $table->string('title_th', 255);
            $table->string('title_en', 255)->nullable();

            // ลำดับตำแหน่ง (ยิ่งน้อยยิ่งมาก่อน)
            $table->integer('sort_order')->default(0);

            // สถานะใช้งาน
            $table->boolean('is_active')->default(true);

            // audit
            $table->string('created_by', 255)->nullable();
            $table->string('updated_by', 255)->nullable();

            $table->timestamps();

            // index เพื่อใช้เรียงและ query เร็ว
            $table->index(['sort_order', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_exec_positions');
    }
};

