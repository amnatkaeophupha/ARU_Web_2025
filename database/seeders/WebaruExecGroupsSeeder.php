<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebaruExecGroupsSeeder extends Seeder
{
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('webaru_exec_executives')->truncate();

        // 2) ค่อยล้าง groups
        DB::table('webaru_exec_groups')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('webaru_exec_groups')->insert([
            [
                'title_th'   => 'ผู้บริหารมหาวิทยาลัย',
                'title_en'   => 'University Executives',
                'sort_order' => 1,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'สำนักงานอธิการบดี',
                'title_en'   => 'Office of the President',
                'sort_order' => 2,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'คณะครุศาสตร์',
                'title_en'   => 'Faculty of Education',
                'sort_order' => 3,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'คณะมนุษยศาสตร์และสังคมศาสตร์',
                'title_en'   => 'Faculty of Humanities and Social Sciences',
                'sort_order' => 4,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'คณะวิทยาการจัดการ',
                'title_en'   => 'Faculty of Management Science',
                'sort_order' => 5,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'คณะวิทยาศาสตร์และเทคโนโลยี',
                'title_en'   => 'Faculty of Science and Technology',
                'sort_order' => 6,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'สถาบันวิจัยและพัฒนา',
                'title_en'   => 'Research and Development Institute',
                'sort_order' => 7,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'สถาบันอยุธยาศึกษา',
                'title_en'   => 'Ayutthaya Studies Institute',
                'sort_order' => 8,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'สำนักวิทยบริการและเทคโนโลยีสารสนเทศ',
                'title_en'   => 'Office of Academic Resources and Information Technology',
                'sort_order' => 9,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'บัณฑิตวิทยาลัย',
                'title_en'   => 'Graduate School',
                'sort_order' => 10,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title_th'   => 'โรงเรียนสาธิต',
                'title_en'   => 'Demonstration School',
                'sort_order' => 11,
                'is_active'  => 1,
                'created_by'=> 'system',
                'updated_by'=> 'system',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
