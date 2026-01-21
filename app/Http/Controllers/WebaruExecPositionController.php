<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WebaruExecPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebaruExecPositionController extends Controller
{

    public function index()
    {
        $execPositions = WebaruExecPosition::all();
        return view('admin.2025_webaru_exec_positions-grid', compact('execPositions'));
    }
 public function store(Request $request)
    {
        $validated = $request->validate([
            'title_th'   => 'required|string|max:255',
            'title_en'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active']  = true;
        $validated['created_by'] = Auth::user()->name ?? null;
        $validated['updated_by'] = Auth::user()->name ?? null;

        WebaruExecPosition::create($validated);

        return back()->with('success', 'เพิ่มตำแหน่งเรียบร้อยแล้ว');
    }

    public function update(Request $request, string $id)
    {
        $item = WebaruExecPosition::findOrFail($id);

        $validated = $request->validate([
            'title_th'   => 'required|string|max:255',
            'title_en'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['updated_by'] = Auth::user()->name ?? null;

        $item->update($validated);

        return back()->with('success', 'อัปเดตตำแหน่งเรียบร้อยแล้ว');
    }

    public function toggleActive(string $id)
    {
        $item = WebaruExecPosition::findOrFail($id);

        $item->update([
            'is_active'  => !$item->is_active,
            'updated_by' => Auth::user()->name ?? null,
        ]);

        return back()->with('success', 'เปลี่ยนสถานะเรียบร้อยแล้ว');
    }

    public function destroy(string $id)
    {
        $item = WebaruExecPosition::findOrFail($id);

        // ถ้าผูก FK restrict แล้ว และมีคนใช้อยู่ จะลบไม่ได้ -> จับ error ที่ DB ได้
        $item->delete();

        return back()->with('success', 'ลบตำแหน่งเรียบร้อยแล้ว');
    }
}
