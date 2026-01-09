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
        Schema::create('webaru_admit_program', function (Blueprint $table) {
            $table->id();

            // FK ไปยังคณะ
            $table->unsignedBigInteger('faculty_id');

            // ชื่อหลักสูตร/สาขา
            $table->string('program_name', 255);

            // สถานะใช้งาน
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // ความสัมพันธ์ + ลบคณะ -> ลบโปรแกรมที่เกี่ยวข้อง
            $table->foreign('faculty_id')
                  ->references('id')
                  ->on('webaru_admit_faculty')
                  ->onDelete('cascade');

            // กันชื่อซ้ำในคณะเดียวกัน (แนะนำ)
            $table->unique(['faculty_id', 'program_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webaru_admit_program');
    }
};
