<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1) สร้าง index ใหม่ก่อน (non-unique)
        DB::statement("
            ALTER TABLE webaru_admit_view_comments
            ADD INDEX idx_cycle_faculty (webaru_admit_cycle_id, webaru_admit_faculty_id)
        ");

        // 2) แล้วค่อย drop unique เดิม (คนละ statement)
        DB::statement("
            ALTER TABLE webaru_admit_view_comments
            DROP INDEX uq_cycle_faculty
        ");
    }

    public function down(): void
    {
        // ย้อนกลับ: ใส่ unique กลับ
        DB::statement("
            ALTER TABLE webaru_admit_view_comments
            ADD UNIQUE uq_cycle_faculty (webaru_admit_cycle_id, webaru_admit_faculty_id)
        ");

        // ลบ index non-unique ที่เพิ่ม
        DB::statement("
            ALTER TABLE webaru_admit_view_comments
            DROP INDEX idx_cycle_faculty
        ");
    }
};

