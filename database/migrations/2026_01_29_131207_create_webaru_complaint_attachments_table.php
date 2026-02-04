<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('webaru_complaint_attachments', function (Blueprint $table) {
            $table->id();

            // FK (มาตรฐาน Laravel)
            $table->foreignId('case_id')
                ->constrained('webaru_complaint_cases')
                ->cascadeOnDelete();

            // File meta
            $table->string('original_name', 255)->nullable();     // ชื่อไฟล์ตอนอัปโหลด
            $table->string('file_name', 255);                     // ชื่อไฟล์ที่เก็บจริง
            $table->string('file_path', 500);                     // path ใน storage
            $table->string('disk', 50)->default('public');        // public|local|s3 (แนะนำ)
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();  // bytes
            $table->string('sha256', 64)->nullable();             // hash integrity (optional)

            // Access / Audit
            $table->boolean('is_private')->default(true);         // ไฟล์ร้องเรียนควร private โดยดีฟอลต์
            $table->unsignedBigInteger('uploaded_by')->nullable(); // null=ประชาชน, not null=admin
            $table->timestamps();
            $table->softDeletes();                                 // แนะนำมากสำหรับ audit

            // Indexes
            $table->index(['case_id', 'created_at']);

            // (optional) กันไฟล์ซ้ำในเคสเดียวกัน (ถ้าต้องการ)
            // $table->unique(['case_id', 'file_name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_complaint_attachments');
    }
};


