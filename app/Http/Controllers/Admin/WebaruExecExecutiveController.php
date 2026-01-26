<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebaruExecExecutive;
use App\Models\WebaruExecGroup;
use App\Models\WebaruExecPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WebaruExecExecutiveController extends Controller
{
    public function index(Request $request)
    {
        $groups = WebaruExecGroup::ordered()->get();
        $positions = WebaruExecPosition::ordered()->get();
        $selectedGroup = $request->filled('group_id')
            ? WebaruExecGroup::find($request->group_id)
            : null;

        $query = WebaruExecExecutive::with(['group', 'position']);

        // filter (ถ้าต้องการใช้ในหน้า grid)
        if ($selectedGroup) {
            $query->where('group_id', $selectedGroup->id);
        }
        if ($request->filled('position_id')) {
            $query->where('position_id', $request->position_id);
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', (int)$request->is_active);
        }
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($w) use ($q) {
                $w->where('name_th', 'like', "%{$q}%")
                  ->orWhere('name_en', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%");
            });
        }

        $executives = $query
            ->orderBy('group_id')
            ->orderBy('position_id')
            ->orderBy('person_order')
            ->paginate(20)
            ->withQueryString();

        return view('admin.2025_webaru_exec_executives-grid', compact(
            'executives', 'groups', 'positions', 'selectedGroup'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'group_id'      => 'required|integer|exists:webaru_exec_groups,id',
            'position_id'   => 'required|integer|exists:webaru_exec_positions,id',
            'name_th'       => 'required|string|max:255',
            'name_en'       => 'nullable|string|max:255',
            'position_text' => 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:50',
            'email'         => 'nullable|email|max:255',
            'person_order'  => 'nullable|integer|min:0',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB
        ]);

        $validated['person_order'] = $validated['person_order'] ?? 0;
        $validated['is_active'] = true;
        $validated['created_by'] = Auth::user()->name ?? null;
        $validated['updated_by'] = Auth::user()->name ?? null;

        $photoFile = $request->file('photo');
        if ($photoFile) {
            unset($validated['photo']);
        }

        $item = WebaruExecExecutive::create($validated);

        // upload photo with custom filename
        if ($photoFile) {
            $extension = $photoFile->extension();
            $fileName = $validated['group_id']
                . '_' . $validated['position_id']
                . '_' . $item->id
                . '_' . now()->format('YmdHis')
                . '.' . $extension;
            $path = $photoFile->storeAs('2025_webaru_executive', $fileName, 'public');
            $item->update(['photo' => $path]);
        }

        return back()->with('success', 'เพิ่มข้อมูลผู้บริหารเรียบร้อยแล้ว');
    }

    public function update(Request $request, string $id)
    {
        $item = WebaruExecExecutive::findOrFail($id);

        $validated = $request->validate([
            'group_id'      => 'required|integer|exists:webaru_exec_groups,id',
            'position_id'   => 'required|integer|exists:webaru_exec_positions,id',
            'name_th'       => 'required|string|max:255',
            'name_en'       => 'nullable|string|max:255',
            'position_text' => 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:50',
            'email'         => 'nullable|email|max:255',
            'person_order'  => 'nullable|integer|min:0',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'remove_photo'  => 'nullable|boolean',
        ]);

        $validated['person_order'] = $validated['person_order'] ?? 0;
        $validated['updated_by'] = Auth::user()->name ?? null;

        // remove old photo
        if (!empty($validated['remove_photo']) && $item->photo) {
            Storage::disk('public')->delete($item->photo);
            $item->photo = null;
        }
        unset($validated['remove_photo']);

        // upload new photo with custom filename
        if ($request->hasFile('photo')) {
            if ($item->photo) {
                Storage::disk('public')->delete($item->photo);
            }
            $photoFile = $request->file('photo');
            $extension = $photoFile->extension();
            $fileName = $validated['group_id']
                . '_' . $validated['position_id']
                . '_' . $item->id
                . '_' . now()->format('His')
                . '.' . $extension;
            $path = $photoFile->storeAs('2025_webaru_executive', $fileName, 'public');
            $validated['photo'] = $path;
        }

        $item->update($validated);

        return back()->with('success', 'อัปเดตข้อมูลผู้บริหารเรียบร้อยแล้ว');
    }

    public function toggleActive(string $id)
    {
        $item = WebaruExecExecutive::findOrFail($id);

        $item->update([
            'is_active'  => !$item->is_active,
            'updated_by' => Auth::user()->name ?? null,
        ]);

        return back()->with('success', 'เปลี่ยนสถานะเรียบร้อยแล้ว');
    }

    public function destroy(string $id)
    {
        $item = WebaruExecExecutive::findOrFail($id);

        // ลบไฟล์รูปด้วย
        if ($item->photo) {
            Storage::disk('public')->delete($item->photo);
        }

        $item->delete();

        return back()->with('success', 'ลบข้อมูลผู้บริหารเรียบร้อยแล้ว');
    }
}
