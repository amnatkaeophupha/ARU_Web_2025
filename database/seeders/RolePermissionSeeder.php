<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // เคลียร์ cache ของ Spatie ทุกครั้งก่อน seed
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        /**
         * Roles (EN keys)
         * admin, public_relations, procurement, human_resources,
         * student_affairs, legal_affairs, quality_assurance, president_secretariat
         */
        $roles = [
            'admin',
            'public_relations', //ประชาสัมพันธ์
            'procurement', //งานพัสดุ
            'human_resources', //งานบุคคล
            'student_affairs', //กองบริการนักศึกษา
            'legal_affairs', //งานนิติกร
            'quality_assurance',   //งานประกันคุณภาพ
            'president_secretariat', //เลขาอธิการ
        ];

        foreach ($roles as $r) {
            Role::firstOrCreate(['name' => $r]);
        }

        /**
         * Permissions (อิงตามเมนูในไฟล์)
         * - แยก Tabs ตามหน่วยงาน/เมนูจริง (Tab 1..5)
         * - แยกงานร้องเรียนตามเมนูจริง
         */
        $permissions = [

            // จัดการผู้ใช้งาน
            'users.manage',

            // จัดการเว็บไซต์หน้าแรก
            'webaru.exec_groups.manage',                 // ผู้บริหารมหาวิทยาลัย
            'webaru.sliders.manage',                     // สไลด์ข่าว 1920
            'webaru.carousels.manage',                   // สไลด์ข่าว 1440
            'webaru.arunews.manage',                     // ข่าว ARU News
            'webaru.tabs.pr.manage',                     // ประชาสัมพันธ์ทั่วไป (tab 1)
            'webaru.tabs.procurement.manage',            // จัดซื้อจัดจ้าง (tab 2)
            'webaru.tabs.hr.manage',                     // รับสมัครงาน (tab 3)
            'webaru.tabs.calendar_regular.manage',        // ปฏิทินการศึกษา (ภาคปกติ) (tab 4)
            'webaru.tabs.calendar_gsbp.manage',           // ปฏิทินการศึกษา (กศ.บป) (tab 5)
            'webaru.galleries.manage',                   // คลังภาพกิจกรรม
            'webaru.admit.manage',                       // ประกาศผลรับเข้า
            'webaru.faq.manage',                         // คำถามที่พบบ่อย

            // ศูนย์รับเรื่องร้องเรียน
            'complaints.dashboard.view',                 // ภาพรวมระบบร้องเรียน
            'complaints.direct.manage',                  // สายตรงอธิการ
            'complaints.general.manage',                 // เรื่องร้องเรียนทั่วไป
            'complaints.documents.manage',               // เอกสารประกอบ
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate(['name' => $p]);
        }

        /**
         * Mapping ตามไฟล์ (ได้/ไม่ได้)
         */
        $map = [
            // admin ได้ทั้งหมด
            'admin' => $permissions,

            // ประชาสัมพันธ์: ได้ตามไฟล์
            'public_relations' => [
                'webaru.exec_groups.manage',
                'webaru.sliders.manage',
                'webaru.carousels.manage',
                'webaru.arunews.manage',
                'webaru.tabs.pr.manage',
                'webaru.galleries.manage',
                'webaru.faq.manage',
            ],

            // งานพัสดุ: จัดซื้อจัดจ้าง
            'procurement' => [
                'webaru.tabs.procurement.manage',
            ],

            // งานบุคคล: รับสมัครงาน
            'human_resources' => [
                'webaru.tabs.hr.manage',
            ],

            // กองบริการนักศึกษา: ตามไฟล์
            'student_affairs' => [
                'webaru.tabs.pr.manage',
                'webaru.tabs.calendar_regular.manage',
                'webaru.tabs.calendar_gsbp.manage',
                'webaru.admit.manage',
                'webaru.faq.manage',
            ],

            // งานนิติกร: ตามไฟล์
            'legal_affairs' => [
                'complaints.dashboard.view',
                'complaints.general.manage',
                'complaints.documents.manage',
            ],

            // งานประกัน: ตามไฟล์
            'quality_assurance' => [
                'complaints.dashboard.view',
            ],

            // เลขาอธิการ: ตามไฟล์
            'president_secretariat' => [
                'complaints.dashboard.view',
                'complaints.direct.manage',
            ],
        ];

        foreach ($map as $roleName => $perms) {
            Role::findByName($roleName)->syncPermissions($perms);
        }
    }
}
