<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebaruExecPositionsSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['title_th' => 'อธิการบดี', 'title_en' => 'President', 'sort_order' => 1],
            ['title_th' => 'รองอธิการบดี', 'title_en' => 'Vice President', 'sort_order' => 2],
            ['title_th' => 'ผู้ช่วยอธิการบดี', 'title_en' => 'Assistant to the President', 'sort_order' => 3],

            ['title_th' => 'คณบดี', 'title_en' => 'Dean', 'sort_order' => 10],
            ['title_th' => 'รองคณบดี', 'title_en' => 'Associate Dean', 'sort_order' => 11],
            ['title_th' => 'ผู้ช่วยคณบดี', 'title_en' => 'Assistant Dean', 'sort_order' => 12],

            ['title_th' => 'ผู้อำนวยการ', 'title_en' => 'Director', 'sort_order' => 20],
            ['title_th' => 'รองผู้อำนวยการ', 'title_en' => 'Deputy Director', 'sort_order' => 21],
        ];

        foreach ($positions as $p) {
            DB::table('webaru_exec_positions')->insert([
                'title_th'   => $p['title_th'],
                'title_en'   => $p['title_en'],
                'sort_order' => $p['sort_order'],
                'is_active'  => 1,
                'created_by' => 'system',
                'updated_by' => 'system',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

