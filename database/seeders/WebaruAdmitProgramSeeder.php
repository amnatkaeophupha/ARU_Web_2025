<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebaruAdmitProgramSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // -------------------------
            // faculty_id = 1 (คณะครุศาสตร์)
            // -------------------------
            ['faculty_id'=>1,'program_code'=>'1501','program_name'=>'คณิตศาสตร์ 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1502','program_name'=>'วิทยาศาสตร์ 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1503','program_name'=>'สังคมศึกษา 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1504','program_name'=>'การศึกษาปฐมวัย 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1505','program_name'=>'คอมพิวเตอร์ศึกษา 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1508','program_name'=>'พลศึกษา 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1510','program_name'=>'การสอนภาษาไทย 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1511','program_name'=>'การสอนภาษาอังกฤษ 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1512','program_name'=>'การประถมศึกษา 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1513','program_name'=>'การศึกษาพิเศษและการสอนภาษาไทย 5 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1514','program_name'=>'คณิตศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1515','program_name'=>'วิทยาศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1516','program_name'=>'สังคมศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1517','program_name'=>'การศึกษาปฐมวัย 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1518','program_name'=>'คอมพิวเตอร์ศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1519','program_name'=>'พลศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1520','program_name'=>'การสอนภาษาไทย 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1521','program_name'=>'การสอนภาษาอังกฤษ 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1522','program_name'=>'การประถมศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1523','program_name'=>'การศึกษาพิเศษ 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1524','program_name'=>'การศึกษาพิเศษและการสอนภาษาไทย 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'0000','program_name'=>'รายวิชาศึกษาทั่วไป','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1525','program_name'=>'การศึกษา วิชาเอกคณิตศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1526','program_name'=>'การศึกษา วิชาเอกวิทยาศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1527','program_name'=>'การศึกษา วิชาเอกสังคมศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1528','program_name'=>'การศึกษา วิชาเอกการศึกษาปฐมวัย 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1529','program_name'=>'การศึกษา วิชาเอกคอมพิวเตอร์ศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1530','program_name'=>'การศึกษา วิชาเอกพลศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1531','program_name'=>'การศึกษา วิชาเอกการสอนภาษาไทย 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1532','program_name'=>'การศึกษา วิชาเอกการสอนภาษาอังกฤษ 4 ปี','is_active'=>1],
            ['faculty_id'=>1,'program_code'=>'1533','program_name'=>'การศึกษา วิชาเอกการประถมศึกษา 4 ปี','is_active'=>1],

            // -------------------------
            // faculty_id = 2 (คณะมนุษยศาสตร์และสังคมศาสตร์)
            // -------------------------
            ['faculty_id'=>2,'program_code'=>'2203','program_name'=>'ภาษาอังกฤษ 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2206','program_name'=>'รัฐประศาสนศาสตร์  4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2209','program_name'=>'ภาษาไทย 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2215','program_name'=>'ภาษาญี่ปุ่น 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2224','program_name'=>'การปกครองท้องถิ่น 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2227','program_name'=>'นิเทศศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2228','program_name'=>'นิติศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2230','program_name'=>'ประวัติศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2233','program_name'=>'สหวิทยาการอิสลาม 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2234','program_name'=>'ศิลปะการแสดง 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2235','program_name'=>'ดนตรีสากล 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2239','program_name'=>'ภาษาจีน 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2240','program_name'=>'การพัฒนาชุมชนและสังคม 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2242','program_name'=>'ประยุกต์ศิลป์ 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2243','program_name'=>'สหวิทยาการอิสลามเพื่อการพัฒนา 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2241','program_name'=>'ดนตรีไทย','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2244','program_name'=>'ดนตรีศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2245','program_name'=>'การสอนภาษาจีน 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2246','program_name'=>'นิเทศศาสตร์ดิจิทัล 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2290','program_name'=>'รัฐประศาสนศาสตร์ (ขึ้นบัญชี)','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2291','program_name'=>'นิติศาสตร์ (ขึ้นบัญชี)','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2293','program_name'=>'การพัฒนาชุมชนและสังคม (ข้นบัญชี)','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2247','program_name'=>'การจัดการรัฐกิจและการปกครองท้องถิ่น 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2207','program_name'=>'ศิลปกรรม','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'0000','program_name'=>'วิชาแกนคณะมนุษยศาสตร์','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'00001','program_name'=>'รายวิชาศึกษาทั่วไป','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2248','program_name'=>'ดนตรีสร้างสรรค์ 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2249','program_name'=>'นาฏศิลป์ศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2250','program_name'=>'ศิลปศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2251','program_name'=>'ดนตรีศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>2,'program_code'=>'2252','program_name'=>'สหวิทยาการเพื่อการจัดการฮาลาล 4 ปี','is_active'=>1],

            // -------------------------
            // faculty_id = 3 (คณะวิทยาศาสตร์และเทคโนโลยี)
            // -------------------------
            ['faculty_id'=>3,'program_code'=>'3201','program_name'=>'เกษตรศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3202','program_name'=>'เคมี 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3206','program_name'=>'วิทยาการคอมพิวเตอร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3208','program_name'=>'คณิตศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3211','program_name'=>'เทคโนโลยีสารสนเทศ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3214','program_name'=>'วิทยาศาสตร์และเทคโนโลยีการอาหาร 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3219','program_name'=>'อาชีวอนามัยและความปลอดภัย 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3224','program_name'=>'วิศวกรรมไฟฟ้า  4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3225','program_name'=>'จุลชีววิทยา 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3226','program_name'=>'คหกรรมศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3227','program_name'=>'วิทยาศาสตร์สิ่งแวดล้อม 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3228','program_name'=>'เทคโนโลยีการผลิตพืช 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3230','program_name'=>'วิศวกรรมการจัดการ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3231','program_name'=>'สาธารณสุขศาสตร์ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3313','program_name'=>'เทคโนโลยีอุตสาหกรรม (ต่อเนื่อง 2 ปี)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3322','program_name'=>'วิศวกรรมไฟฟ้า  4 ปี (เทียบโอน)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3327','program_name'=>'วิศวกรรมการจัดการ 4 ปี (เทียบโอน)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'0003','program_name'=>'คณะวิทยาศาสตร์และเทคโนโลยี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3290','program_name'=>'วิทยาการคอมพิวเตอร์ (ขึ้นบัญชี)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3291','program_name'=>'วิศวกรรมจัดการจัดการ (ขึ้นบัญชี)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3390','program_name'=>'เทคโนโลยีอุตสาหกรรม 2 ปี (ต่อเนื่อง) (ขึ้นบัญชี)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3391','program_name'=>'วิศวกรรมการจัดการ 4 ปี (เทียบโอน) (ขึ้นบัญชี)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3232','program_name'=>'คณิตศาสตร์ประยุกต์ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3233','program_name'=>'วิทยาศาสตร์และการจัดการเทคโนโลยีอาหาร 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'00000','program_name'=>'รายวิชาศึกษาทั่วไป','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3236','program_name'=>'วิทยาศาสตร์ศึกษา 4 ปี (แขนงวิชาชีววิทยา)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3234','program_name'=>'วิทยาศาสตร์ศึกษา 4 ปี (แขนงวิชาฟิสิกส์)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3235','program_name'=>'วิทยาศาสตร์ศึกษา 4 ปี (แขนงวิชาเคมี)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3237','program_name'=>'เทคโนโลยีการเกษตรสมัยใหม่ 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3401','program_name'=>'วิทยาศาสตร์สิ่งแวดล้อมและเคมี 4 ปี (หลักสูตรปริญญาคู่ขนาน)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3238','program_name'=>'เทคโนโลยีสิ่งแวดล้อม 4 ปี','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3328','program_name'=>'เทคโนโลยีอุตสาหกรรม 2 ปี (ต่อเนื่อง) (การจัดการเทคโนโลยีอุตสาหกรรม)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3329','program_name'=>'เทคโนโลยีอุตสาหกรรม 2 ปี (ต่อเนื่อง) (เทคโนโลยีระบบควบคุมการผลิตอัตโนมัติ)','is_active'=>1],
            ['faculty_id'=>3,'program_code'=>'3330','program_name'=>'วิศวกรรมปัญญาประดิษฐ์ 2 ปี (ต่อเนื่อง)','is_active'=>1],

            // -------------------------
            // faculty_id = 4 (คณะวิทยาการจัดการ)
            // -------------------------
            ['faculty_id'=>4,'program_code'=>'4214','program_name'=>'การบัญชี 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4230','program_name'=>'การจัดการ 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4232','program_name'=>'การบริหารทรัพยากรมนุษย์ 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4233','program_name'=>'การตลาด 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4234','program_name'=>'คอมพิวเตอร์ธุรกิจ 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4244','program_name'=>'การจัดการโลจิสติกส์ 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4246','program_name'=>'การท่องเที่ยว 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4252','program_name'=>'ธุรกิจระหว่างประเทศ 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4253','program_name'=>'การเป็นผู้ประกอบการ 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4257','program_name'=>'เศรษฐศาสตร์การเงินการธนาคาร 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4258','program_name'=>'การจัดการธุรกิจโรงแรม 4 ปี (หลักสูตรภาษาอังกฤษ)','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4259','program_name'=>'การจัดการธุรกิจการค้าสมัยใหม่ 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4335','program_name'=>'การจัดการ 4 ปี (เทียบโอน)','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4261','program_name'=>'การจัดการธุรกิจชุมชน','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4262','program_name'=>'การจัดการโลจิสติกส์และซัพพลายเชน 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4263','program_name'=>'การตลาด 4 ปี (แขนงดิจิทัลมาร์เกตติง)','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4264','program_name'=>'การตลาด 4 ปี (แขนงอิเวนต์มาร์เกตติง)','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'0000','program_name'=>'รายวิชาศึกษาทั่วไป','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4265','program_name'=>'ธุรกิจและอาชีวศึกษา 4 ปี','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'99','program_name'=>'ผู้สมัครที่เลือกสาขาวิชาอันดับที่ 1 ไม่มีการสัมภาษณ์และเลือกสาขาวิชาอันดับสองที่มีการสอบสัมภาษณ์','is_active'=>1],
            ['faculty_id'=>4,'program_code'=>'4266','program_name'=>'การท่องเที่ยวและบริการ 4 ปี','is_active'=>1],
        ];

        // กันข้อมูลซ้ำ: ต้องมี unique key (faculty_id, program_code)
        DB::table('webaru_admit_program')->upsert(
            $rows,
            ['faculty_id', 'program_code'],
            ['program_name', 'is_active']
        );
    }
}
