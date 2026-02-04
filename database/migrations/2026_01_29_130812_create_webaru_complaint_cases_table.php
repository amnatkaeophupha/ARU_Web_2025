<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('webaru_complaint_cases', function (Blueprint $table) {
            $table->id();

            /* ===============================
             * Reference / Tracking
             * =============================== */
            $table->string('case_no', 30)->unique();          // ARU-2026-000123
            $table->string('pin_hash', 255)->nullable();      // hashed PIN สำหรับติดตาม
            $table->timestamp('pin_created_at')->nullable(); // อายุ PIN / audit เช่น ตั้งอายุ PIN (เช่น 90 วัน) หรือ ตรวจสอบการเข้าถึงย้อนหลัง

            /* ===============================
             * Type / Channel
             * =============================== */
            $table->string('type_code', 20);                  // GRIEVANCE=ร้องเรียนทั่วไป|OPINION=รับความคิดเห็น|CORRUPTION=ร้องเรียนการทุจริตฯ|DIRECT= สายตรงอธิการ
            $table->string('channel', 20)->default('WEB');    // WEB|PHONE|EMAIL|WALKIN ช่วยทำรายงานได้ว่า “เรื่องมาจากช่องทางไหน”

            /* ===============================
             * Content
             * =============================== */
            $table->string('subject', 255);
            $table->longText('detail');

            /* ===============================
             * Privacy / Contact
             * =============================== */
            $table->boolean('is_anonymous')->default(false); // 0 เปิดเผยชื่อ|1 ไม่เปิดเผยชื่อ (ไม่บังคับ)
            $table->string('contact_name', 255)->nullable();
            $table->string('contact_email', 255)->nullable();
            $table->string('contact_phone', 50)->nullable();

            /* ===============================
             * PDPA / Consent (สำคัญต่อ ITA)
             * =============================== */
            $table->boolean('pdpa_accept')->default(false); // 0 ข้าพเจ้าได้อ่านและยอมรับนโยบายความเป็นส่วนตัวแล้ว
            $table->boolean('consent')->default(false);   // 0 ยินยอมให้มหาวิทยาลัยใช้ข้อมูลเพื่อการตรวจสอบและติดตามผล
            $table->timestamp('consented_at')->nullable();

            /* ===============================
             * Workflow / Management
             * =============================== */
            $table->string('status', 20)->default('NEW'); //สถานะงาน (Lifecycle)
            // NEW=รับเรื่องแล้ว|IN_PROGRESS=กำลังดำเนินการ|NEED_INFO=รอข้อมูลเพิ่มเติม|ANSWERED=ตอบแล้ว|CLOSED=ปิดเรื่อง|REJECTED=ยกเลิก

            $table->string('priority', 20)->default('NORMAL');
            // LOW=ต่ำ|NORMAL=ปกติ|HIGH=สูง|URGENT=ด่วน

            $table->unsignedBigInteger('assigned_to')->nullable(); // เจ้าหน้าที่ผู้รับผิดชอบ

            /* ===============================
             * Audit / Anti-spam
             * =============================== */
            $table->string('submitted_ip', 45)->nullable();        // IPv4/IPv6
            $table->text('submitted_user_agent')->nullable();
            $table->string('source_url', 500)->nullable(); //รู้ว่าผู้ใช้มาจากหน้าไหน
            $table->string('referrer_url', 500)->nullable(); //มีประโยชน์มากกับเว็บมหาวิทยาลัยที่มีหลายเมนู

            /* ===============================
             * Dates (ใช้ทำรายงาน)
             * =============================== */
            $table->timestamp('answered_at')->nullable(); //ระยะเวลาตอบ
            $table->timestamp('closed_at')->nullable(); //ระยะเวลาปิดเรื่อง

            /* ===============================
             * Admin Audit
             * =============================== */
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            /* ===============================
             * System
             * =============================== */
            $table->timestamps();
            $table->softDeletes();

            /* ===============================
             * Indexes (สำคัญมาก)
             * =============================== */
            $table->index(['type_code', 'status']);
            $table->index(['status', 'created_at']);
            $table->index(['assigned_to', 'status']);
            $table->index('case_no');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_complaint_cases');
    }
};
