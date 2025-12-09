<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebaruGalleryController extends Controller
{

    // public function index()
    // {
    //     // ตัวอย่างแบบง่าย: ใส่ข้อมูลรูปเป็น array ก่อน
    //     // ภายหลังค่อยเปลี่ยนเป็นอ่านจาก DB หรือ storage ก็ได้
    //     $photos = [
    //         [
    //             'file'   => 'apg-1.jpg',
    //             'thumb'  => 'apg-1-thumb.jpg',
    //             'title'  => 'กิจกรรมรับน้องใหม่ 2568',
    //             'detail' => 'ณ มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา'
    //         ],
    //         [
    //             'file'   => 'apg-2.jpg',
    //             'thumb'  => 'apg-2-thumb.jpg',
    //             'title'  => 'โครงการอบรมเชิงปฏิบัติการ',
    //             'detail' => 'สำนักวิทยบริการและเทคโนโลยีสารสนเทศ'
    //         ],
    //         // เพิ่มรูปอื่น ๆ ได้เลย
    //     ];

    //     return view('gallery.index', compact('photos'));
    // }

    public function index()
    {
        // ทดสอบง่าย ๆ ก่อน
        return view('webaru_bs3.gallery');
    }
}
