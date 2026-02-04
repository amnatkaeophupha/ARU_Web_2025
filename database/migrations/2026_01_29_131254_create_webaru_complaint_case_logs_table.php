<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('webaru_complaint_case_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('case_id')
                ->constrained('webaru_complaint_cases')
                ->cascadeOnDelete();

            $table->string('action', 50);                 // created|assigned|status_changed|replied|closed|...
            $table->string('from_status', 20)->nullable();
            $table->string('to_status', 20)->nullable();

            $table->longText('remark')->nullable();       // รายละเอียด/ข้อความตอบกลับ/บันทึก
            $table->boolean('is_public')->default(false); // true = แสดงในหน้าติดตามได้

            // เก็บข้อมูลเสริมแบบยืดหยุ่น (แนะนำ)
            $table->json('meta')->nullable();             // {"assigned_to": 5, "priority":"HIGH", "reply_files":[...]}

            $table->unsignedBigInteger('created_by')->nullable(); // null = system/auto
            $table->string('created_ip', 45)->nullable();
            $table->text('created_user_agent')->nullable();       // optional

            $table->timestamp('event_at')->nullable();     // optional: เวลาเกิดเหตุการณ์จริง
            $table->timestamps();
            $table->softDeletes();                         // แนะนำสำหรับ audit

            $table->index(['case_id', 'created_at']);
            $table->index(['action', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_complaint_case_logs');
    }
};

