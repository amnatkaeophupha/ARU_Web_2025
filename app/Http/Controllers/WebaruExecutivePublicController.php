<?php

namespace App\Http\Controllers;

use App\Models\WebaruExecGroup;
use App\Models\WebaruExecPosition;
use App\Models\WebaruExecExecutive;

class WebaruExecutivePublicController extends Controller
{
    public function index()
    {
        // 1) ดึงตำแหน่งตาม sort_order (หัวข้อใหญ่ในหน้า)
        $positions = WebaruExecPosition::active()->ordered()->get();

        // 2) ดึงรายชื่อผู้บริหารที่ active พร้อม group/position
        $executives = WebaruExecExecutive::with(['group', 'position'])
            ->where('is_active', 1)
            ->orderBy('position_id')
            ->orderBy('person_order')
            ->get();

        // 3) จัดกลุ่มตาม position_id เพื่อให้ blade loop ง่าย
        $executivesByPosition = $executives->groupBy('position_id');

        return view('webaru_bs5.executives', compact('positions', 'executivesByPosition'));
    }
}
