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
        // เพิ่มคอลัมน์ถ้ายังไม่มี (ตามที่คุณต้องการ)
        if (!Schema::hasColumn('webaru_admit_program', 'program_code')) {
            $table->string('program_code', 20)->after('faculty_id');
        }

        // กันซ้ำ: faculty_id + program_code
        $table->unique(['faculty_id', 'program_code'], 'uq_faculty_program_code');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('webaru_admit_program', function (Blueprint $table) {
            $table->dropUnique('uq_faculty_program_code');

            if (Schema::hasColumn('webaru_admit_program', 'program_code')) {
                $table->dropColumn('program_code');
            }
        });
    }
};
