<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebaruExecGroup;
use App\Models\WebaruExecPosition;
use App\Models\WebaruExecExecutive;

class WebaruExecutivePublicController extends Controller
{
    public function index(Request $request)
    {
        $execGroups = WebaruExecGroup::active()->ordered()->get();
        $defaultGroupId = optional(
            $execGroups->firstWhere('title_th', 'ผู้บริหารมหาวิทยาลัย')
        )->id;
        $selectedGroupId = $request->integer('group') ?: $defaultGroupId;
        if ($selectedGroupId && ! $execGroups->contains('id', $selectedGroupId)) {
            $selectedGroupId = null;
        }

        // 1) ดึงตำแหน่งตาม sort_order (หัวข้อใหญ่ในหน้า)
        $positions = WebaruExecPosition::active()->ordered()->get();

        // 2) ดึงรายชื่อผู้บริหารที่ active พร้อม group/position
        $executiveQuery = WebaruExecExecutive::with(['group', 'position'])
            ->active()
            ->ordered();
        if ($selectedGroupId) {
            $executiveQuery->where('group_id', $selectedGroupId);
        }
        $executives = $executiveQuery->get();

        // 3) จัดกลุ่มตาม position_id เพื่อให้ blade loop ง่าย
        $executivesByPosition = $executives->groupBy('position_id');

        return view('webaru_bs5.executives', compact(
            'execGroups',
            'selectedGroupId',
            'positions',
            'executivesByPosition'
        ));
    }
}
