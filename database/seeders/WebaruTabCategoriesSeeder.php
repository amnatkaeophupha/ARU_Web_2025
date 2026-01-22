<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebaruTabCategory;

class WebaruTabCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'ประชาสัมพันธ์ทั่วไป', 'slug' => 'general', 'sort_order' => 1],
            ['name' => 'จัดซื้อจัดจ้าง', 'slug' => 'procurement', 'sort_order' => 2],
            ['name' => 'รับสมัครงาน', 'slug' => 'jobs', 'sort_order' => 3],
            ['name' => 'ข่าวสารนักศึกษา', 'slug' => 'student', 'sort_order' => 4],
            ['name' => 'ปฏิทินการศึกษา(ภาคปกติ)', 'slug' => 'calendar-regular', 'sort_order' => 5],
            ['name' => 'ปฏิทินการศึกษา(กศ.บป)', 'slug' => 'calendar-parttime', 'sort_order' => 6],
        ];

        foreach ($data as $item) {
            WebaruTabCategory::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}
