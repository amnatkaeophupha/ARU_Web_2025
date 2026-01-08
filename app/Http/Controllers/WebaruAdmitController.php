<?php

namespace App\Http\Controllers;

use App\Models\WebaruAdmitcycle;
use App\Models\WebaruAdmincycleFileDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;


class WebaruAdmitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $items = WebaruAdmitcycle::query()
            ->where('is_active', true)
            ->orderByDesc('year')
            ->orderByDesc('id')
            ->get();

        return view('admin.2025_webaru_home_admit-grid', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year'        => 'required|string|max:4',
            'title'       => 'required|string|max:255',
            'schedules'   => 'nullable|string',
            'head_detail' => 'nullable|string',
            'description' => 'nullable|string',
            'files'       => 'nullable|file|mimes:pdf',
        ]);

        $data = [
            'year'        => $request->year,
            'title'       => $request->title,
            'schedules'   => $request->schedules,
            'head_detail' => $request->head_detail,
            'description' => $request->description,
            'is_active'   => true,
            'created_by'  => Auth::user()->name,
        ];



        if ($request->hasFile('files')) {

            $file      = $request->file('files');
            $extension = $file->getClientOriginalExtension();

            $filename = 'cycle_'. $request->year. '_' . now()->format('Ymd_His'). '.' . $extension;

            $data['files'] = $file->storeAs('2025_webaru_home_admitcycle',$filename,'public');

        }

        WebaruAdmitcycle::create($data);
        return redirect()->back()->with('success', 'เพิ่มรอบการรับสมัครเรียบร้อยแล้ว');
    }

    public function admitcycle_upload(Request $request, string $id)
    {
        $item = WebaruAdmitcycle::findOrFail($id);

        $request->validate([
            'files' => 'required|file|mimes:pdf|max:10240', // 10MB
        ]);

        // ลบไฟล์เก่า (ถ้ามี)
        if ($item->files && Storage::disk('public')->exists($item->files)) {
            Storage::disk('public')->delete($item->files);
        }

        $file = $request->file('files');
        $ext  = $file->getClientOriginalExtension();

        // ตั้งชื่อสั้น
        $filename = 'cycle_'.$item->year.'_'.now()->format('Ymd_His').'.'.$ext;

        // เก็บไฟล์ (โฟลเดอร์เดียวกับที่คุณใช้ก็ได้)
        $path = $file->storeAs('2025_webaru_home_admitcycle', $filename, 'public');

        // อัปเดต DB
        $item->update([
            'files' => $path,
        ]);

        return redirect()->back()->with('success', 'อัปโหลดไฟล์ PDF เรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(WebaruAdmit $webaruAdmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$item = WebaruAdmitcycle::findOrFail($id);
        $item = WebaruAdmitcycle::with('fileDetails')->findOrFail($id);
        return view('admin.2025_webaru_home_admit-edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = WebaruAdmitcycle::findOrFail($id);

        $request->validate([
            'year' => 'required|string|max:4',
            'title' => 'required|string|max:255',
            'schedules' => 'nullable|string',
            'head_detail' => 'nullable|string',
            'description' => 'nullable|string',
            'updated_by'  => Auth::user()->name,
        ]);

        $data = [
            'year'        => $request->year,
            'title'       => $request->title,
            'schedules'   => $request->schedules,
            'head_detail' => $request->head_detail,
            'description' => $request->description,
            'updated_by'  => Auth::user()->name,
        ];

        if ($request->hasFile('files')) {

            if ($item->files && Storage::disk('public')->exists($item->files)) {
                Storage::disk('public')->delete($item->files);
            }

            $file      = $request->file('files');
            $extension = $file->getClientOriginalExtension();

            // ตั้งชื่อไฟล์สั้น
            // ตัวอย่าง: admit_2569_143522.pdf
            $filename = 'cycle_'. $request->year. '_' . now()->format('Ymd_His'). '.' . $extension;

            $data['files'] = $file->storeAs('2025_webaru_home_admitcycle',$filename,'public');
        }

        $item->update($data);
        return redirect()->to('admin/webaru-admit/edit/'.$id)->with('success', 'อัปเดตเรียบร้อย');

    }

    public function admincycle_file_detail_store(Request $request, string $id){

        // ตรวจสอบว่ารอบรับเข้ามีจริง
        $request->validate([
            'file_name' => 'nullable|string|max:255',
            'files'     => 'required|file|mimes:pdf|max:5120', // 5MB
        ]);

        $file = $request->file('files');
        $ext  = $file->getClientOriginalExtension();

        // ตั้งชื่อไฟล์สั้น
        // ตัวอย่าง: detail_2569_153012.pdf
        $filename = $request->id.'_'.now()->format('Ymd_His'). '.' . $ext;
        // $filename = 'detail_'. now()->format('Ymd_His'). '.' . $ext;

        $path = $file->storeAs('2025_webaru_home_admitcycle_file_detail',$filename,'public');

        WebaruAdmincycleFileDetail::create([
            'webaru_admitcycle_id' => $id,
            'file_name'  => $request->file_name,
            'file_path'  => $path,
            'uploaded_by'=> Auth::user()->name,
        ]);

        return redirect()
            ->back()
            ->with('success', 'อัปโหลดไฟล์เพิ่มเติมเรียบร้อยแล้ว');
    }

    public function admincycle_file_detail_destroy(string $id)
    {
        $file = WebaruAdmincycleFileDetail::findOrFail($id);

        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return redirect()->back()->with('success', 'ลบไฟล์เรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = WebaruAdmitcycle::with('fileDetails')->findOrFail($id);

        // 1) ลบไฟล์ PDF หลัก (ถ้ามี)
        if ($item->files && Storage::disk('public')->exists($item->files)) {
            Storage::disk('public')->delete($item->files);
        }

        // 2) ลบไฟล์ย่อย + record ลูก
        foreach ($item->fileDetails as $detail) {
            if ($detail->file_path && Storage::disk('public')->exists($detail->file_path)) {
                Storage::disk('public')->delete($detail->file_path);
            }
            $detail->delete(); // ลบ record ลูก
        }

        // 3) ลบ record แม่
        $item->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลและไฟล์ที่เกี่ยวข้องเรียบร้อยแล้ว');
    }

    public function fileDetails()
    {
        return $this->hasMany(\App\Models\WebaruAdmincycleFileDetail::class, 'webaru_admitcycle_id');
    }
}
