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
        Schema::create('webaru_admincycle_file_detail', function (Blueprint $table) {
            $table->id();

            // FK ไปตารางหลัก webaru_admitcycles
            $table->foreignId('webaru_admitcycle_id')->constrained('webaru_admitcycles')->cascadeOnDelete();

            $table->string('file_name', 255)->nullable(); // ชื่อที่แสดง/คำอธิบายไฟล์ (ถ้าต้องการ)
            $table->string('file_path', 255);            // path ใน storage (แนะนำให้ not null)
            $table->string('uploaded_by', 255)->nullable();

            $table->timestamps();

            // เพิ่ม index ช่วย query เร็วขึ้น
            $table->index('webaru_admitcycle_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webaru_admincycle_file_detail');
    }
};
