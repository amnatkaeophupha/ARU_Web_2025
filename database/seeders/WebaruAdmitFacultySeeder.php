<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebaruAdmitFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('webaru_admit_faculty')->insert([
            [
                'faculty_name' => 'คณะครุศาสตร์',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'คณะมนุษยศาสตร์และสังคมศาสตร์',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'คณะวิทยาการจัดการ',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
