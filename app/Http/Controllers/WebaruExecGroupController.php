<?php

namespace App\Http\Controllers;

use App\Models\WebaruExecGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebaruExecGroupController extends Controller
{
    public function index()
    {
        $execGroups = WebaruExecGroup::all();
        return view('admin.2025_webaru_exec_groups-grid', compact('execGroups'));
    }

    public function toggleActive(string $id)
    {
        $item = WebaruExecGroup::findOrFail($id);

        $item->update([
            'is_active' => !$item->is_active,
            'updated_by' => Auth::user()->name ?? null,
        ]);

        return back()->with('success', 'เปลี่ยนสถานะเรียบร้อยแล้ว');
    }

    public function update(Request $request, string $id)
    {
        $item = WebaruExecGroup::findOrFail($id);

        $validated = $request->validate([
            'title_th' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['updated_by'] = Auth::user()->name ?? null;

        $item->update($validated);

        return back()->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    public function update_exec_groups(Request $request, string $id)
    {
        return $this->update($request, $id);
    }

    public function store_exec_groups(Request $request)
    {
        $validated = $request->validate([
            'title_th' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['created_by'] = Auth::user()->name ?? null;
        $validated['updated_by'] = Auth::user()->name ?? null;
        $validated['is_active'] = true;

        WebaruExecGroup::create($validated);

        return back()->with('success', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy_exec_groups(string $id)
    {
        $item = WebaruExecGroup::findOrFail($id);
        $item->delete();

        return back()->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
}
