<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webaru_exec_executives', function (Blueprint $table) {
            $table->id();

            // ความสัมพันธ์หลัก
            $table->unsignedBigInteger('group_id');     // หน่วยงาน
            $table->unsignedBigInteger('position_id');  // ตำแหน่ง

            // ข้อมูลบุคคล
            $table->string('name_th', 255);
            $table->string('name_en', 255)->nullable();

            // ข้อความตำแหน่งเฉพาะ (เช่น รองอธิการบดีฝ่าย...)
            $table->string('position_text', 255)->nullable();

            // ติดต่อ
            $table->string('phone', 50)->nullable();
            $table->string('email', 255)->nullable()->index();

            // รูปภาพ
            $table->string('photo', 255)->nullable();

            // ลำดับภายในตำแหน่งเดียวกัน
            $table->unsignedInteger('person_order')->default(0);

            // สถานะ
            $table->boolean('is_active')->default(true);

            // audit
            $table->string('created_by', 255)->nullable();
            $table->string('updated_by', 255)->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('group_id')
                  ->references('id')->on('webaru_exec_groups')
                  ->onDelete('cascade');

            $table->foreign('position_id')
                  ->references('id')->on('webaru_exec_positions')
                  ->onDelete('restrict');

            // Index สำหรับ query หน้าเว็บ
            $table->index(['group_id', 'position_id', 'is_active']);
            $table->index(['person_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_exec_executives');
    }
};
