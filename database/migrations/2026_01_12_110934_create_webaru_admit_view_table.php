<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webaru_admit_view', function (Blueprint $table) {
            $table->id();

            // FK รอบรับเข้า
            $table->foreignId('webaru_admit_cycle_id')
                ->constrained('webaru_admit_cycles')
                ->cascadeOnDelete();

            // FK สาขาวิชา
            $table->foreignId('webaru_admit_program_id')
                ->constrained('webaru_admit_program')
                ->cascadeOnDelete();

            // ไฟล์ประกาศผล (pdf)
            $table->string('files')->nullable();

            // หมายเหตุ
            $table->text('comment')->nullable();

            $table->timestamps();

            // ป้องกันข้อมูลซ้ำ (1 รอบ + 1 สาขา มีได้รายการเดียว)
            $table->unique(
                ['webaru_admit_cycle_id', 'webaru_admit_program_id'],
                'admit_view_unique'
            );

            $table->unique(['webaru_admit_cycle_id', 'webaru_admit_program_id'], 'uniq_cycle_program');
        });


    }

    public function down(): void
    {
        Schema::dropIfExists('webaru_admit_view');
    }
};
