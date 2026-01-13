<?php

namespace App\Http\Controllers;

use App\Models\WebaruAdmitCycle;
use App\Models\WebaruAdmitCycleFileDetail;
use App\Models\WebaruAdmitFaculty;
use App\Models\WebaruAdmitView;
use App\Models\WebaruAdmitProgram;
use App\Models\WebaruAdmitViewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;


class WebaruAdmitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $items = WebaruAdmitCycle::orderByDesc('id')->get();

        return view('admin.2025_webaru_home_admit-grid', compact('items'));
    }

    public function viewByCycle(string $cycleId)
    {
        $cycle = WebaruAdmitCycle::findOrFail($cycleId);

        $faculties = WebaruAdmitFaculty::query()
        ->orderBy('id', 'asc')
        ->with([
            'programs' => function ($q) {
                $q->orderBy('program_code', 'asc'); // แล้วแต่ต้องการ
            },
            'programs.admitViews' => function ($q) use ($cycleId) {
                $q->where('webaru_admit_cycle_id', $cycleId)
                  ->orderByDesc('id');
            },
            'viewComments' => function ($q) use ($cycleId) {
                $q->where('webaru_admit_cycle_id', $cycleId)
                  ->orderByDesc('id'); // ✅ ให้ได้หลาย comment + เรียง
            },
        ])
        ->get();

        return view('admin.2025_webaru_home_admit-view', compact('cycle', 'faculties'));
    }


    public function attachProgramsToCycle(Request $request, string $cycleId)
    {
        $request->validate([
            'programs'   => 'required|array|min:1',
            'programs.*' => 'integer|exists:webaru_admit_program,id',
        ]);

        $programIds = $request->input('programs', []);

        foreach ($programIds as $programId) {
            // กันซ้ำ (สำคัญมาก)
            WebaruAdmitView::firstOrCreate(
                [
                    'webaru_admit_cycle_id'   => $cycleId,
                    'webaru_admit_program_id' => $programId,
                ],
                [
                    'files'   => null,
                    'comment' => null,
                ]
            );
        }

       return redirect()->to('admin/webaru-admit/view/'.$cycleId)->with('success', 'บันทึกสาขาที่เลือกเข้ารอบนี้เรียบร้อยแล้ว');
    }

    public function admitViewUpload(Request $request, string $cycleId, string $programId)
    {
        $request->validate([
            'files'   => 'nullable|file|mimes:pdf|max:10240', // 10MB
            'comment' => 'nullable|string|max:2000',
        ]);

        // หา record เดิมของ (cycle_id + program_id) ถ้าไม่มีให้สร้างใหม่
        $view = WebaruAdmitView::firstOrNew([
            'webaru_admit_cycle_id'   => $cycleId,
            'webaru_admit_program_id' => $programId,
        ]);

        // ถ้ามีไฟล์ใหม่ -> ลบไฟล์เก่าแล้วอัปโหลดใหม่
        if ($request->hasFile('files')) {

            // ลบไฟล์เดิม
            if ($view->files && Storage::disk('public')->exists($view->files)) {
                Storage::disk('public')->delete($view->files);
            }

            $file = $request->file('files');
            $ext  = $file->getClientOriginalExtension();

            // ตั้งชื่อไฟล์สั้น
            // ตัวอย่าง: view_5_3206_20260112_103000.pdf
            $filename = 'view_'.$cycleId.'_'.$programId.'_'.now()->format('Ymd_His').'.'.$ext;

            $path = $file->storeAs('2025_webaru_home_admit_view', $filename, 'public');

            $view->files = $path;
        }

        // อัปเดตหมายเหตุ
        $view->comment = $request->comment;

        // (ถ้าตารางมี uploaded_by ก็เก็บได้)
        // $view->uploaded_by = Auth::user()->name;

        $view->save();

        // ✅ กลับหน้าเดิมตาม cycle_id
        return redirect()->to('admin/webaru-admit/view/'.$cycleId)
            ->with('success', 'อัปโหลด/บันทึกข้อมูลประกาศผลเรียบร้อยแล้ว');
    }

    public function destroyView(string $id)
    {
        $view = WebaruAdmitView::findOrFail($id);

        // ลบไฟล์ PDF ถ้ามี
        if ($view->files && Storage::disk('public')->exists($view->files)) {
            Storage::disk('public')->delete($view->files);
        }

        // ลบ record
        $view->delete();

        return redirect()->back()->with('success', 'ลบประกาศผลเรียบร้อยแล้ว');
    }


    public function viewComment(string $cycleId, string $facultyId)
    {
        $faculty = WebaruAdmitFaculty::with('programs')->findOrFail($facultyId);

        // โหลดข้อมูล admit_view ของ cycle นี้ เฉพาะคณะนี้
        $views = WebaruAdmitView::where('webaru_admit_cycle_id', $cycleId)
            ->whereIn(
                'webaru_admit_program_id',
                $faculty->programs->pluck('id')
            )
            ->with('program')
            ->get()
            ->keyBy('webaru_admit_program_id');

        return view(
            'admin.2025_webaru_home_admit-view-comment',
            compact('faculty', 'cycleId', 'views')
        );
    }


    public function storeFacultyComment(Request $request, $cycleId, $facultyId)
    {
        $request->validate([
            'comment' => 'nullable|string',
        ]);

        // create หรือ update ด้วยคู่ (cycle + faculty)
        WebaruAdmitViewComment::create([
            'webaru_admit_cycle_id'  => $cycleId,
            'webaru_admit_faculty_id'=> $facultyId,
            'comment'                => $request->comment,
            'created_by'             => Auth::user()->name,
        ]);

        return redirect()->to("admin/webaru-admit/view/{$cycleId}")->with('success', 'บันทึกคำอธิบายเรียบร้อยแล้ว');
    }

    public function deleteViewComment($id)
    {
        $comment = WebaruAdmitViewComment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'ลบคำอธิบายเรียบร้อยแล้ว');
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

        WebaruAdmitCycle::create($data);
        return redirect()->back()->with('success', 'เพิ่มรอบการรับสมัครเรียบร้อยแล้ว');
    }

    public function admitcycle_upload(Request $request, string $id)
    {
        $item = WebaruAdmitCycle::findOrFail($id);

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
     * course webaru_admit_Program Table
     */
    public function course(string $facultyId, Request $request)
    {
        $faculty  = WebaruAdmitFaculty::findOrFail($facultyId);
        $cycleId  = $request->query('cycle_id');

        return view('admin.2025_webaru_home_admit-course',compact('faculty','cycleId'));

    }

    public function programStore(Request $request, string $faculty)
    {
        // กัน faculty_id ผิด
        $facultyObj = WebaruAdmitFaculty::findOrFail($faculty);

        $request->validate([
            'program_code' => 'required|string|max:20',
            'program_name' => 'required|string|max:255',
        ]);

        // กันซ้ำ (กรณีมี unique faculty_id + program_code)
        $exists = WebaruAdmitProgram::where('faculty_id', $facultyObj->id)
            ->where('program_code', $request->program_code)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('fail', 'รหัสสาขานี้มีอยู่แล้วในคณะนี้');
        }

        WebaruAdmitProgram::create([
            'faculty_id'   => $facultyObj->id,
            'program_code' => $request->program_code,
            'program_name' => $request->program_name,
            'is_active'    => true,
        ]);

        return redirect()->back()->with('success', 'เพิ่มสาขาวิชาเรียบร้อยแล้ว');
    }

    public function programUpdate(Request $request, string $id)
    {
        $program = WebaruAdmitProgram::findOrFail($id);

        // ถ้ามี unique (faculty_id + program_code) และต้องการกันซ้ำ:
        // ให้ validate แบบนี้แทน (แนะนำ)
        $request->validate([
            'program_code' => [
                'required','string','max:20',
                Rule::unique('webaru_admit_program', 'program_code')
                    ->where('faculty_id', $program->faculty_id)
                    ->ignore($program->id),
            ],
            'program_name' => 'required|string|max:255',
        ]);

        $program->update([
            'program_code' => $request->program_code,
            'program_name' => $request->program_name,
        ]);

        return redirect()->back()->with('success', 'แก้ไขสาขาวิชาเรียบร้อยแล้ว');
    }

    public function programDestroy(string $id)
    {
        $program = WebaruAdmitProgram::findOrFail($id);

        // ถ้ามีความสัมพันธ์ในอนาคต (เช่น admit_view)
        // ให้เช็คก่อนลบ
        if ($program->admitViews()->exists()) {
            return redirect()->back()->with('fail', 'ไม่สามารถลบสาขานี้ได้ เนื่องจากมีข้อมูลประกาศผลผูกอยู่');
        }

        $program->admitViews()->delete();
        $program->delete();

        return redirect()->back()->with('success', 'ลบสาขาวิชาเรียบร้อยแล้ว');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$item = WebaruAdmitCycle::findOrFail($id);
        $item = WebaruAdmitCycle::with('fileDetails')->findOrFail($id);
        return view('admin.2025_webaru_home_admit-edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = WebaruAdmitCycle::findOrFail($id);

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

        WebaruAdmitCycleFileDetail::create([
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
        $file = WebaruAdmitCycleFileDetail::findOrFail($id);

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
        $item = WebaruAdmitCycle::with('fileDetails')->findOrFail($id);

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
        return $this->hasMany(\App\Models\WebaruAdmitCycleFileDetail::class, 'webaru_admitcycle_id');
    }

    public function toggleActive(string $id)
    {
        $item = WebaruAdmitCycle::findOrFail($id);

        $item->update([
            'is_active' => !$item->is_active,
            'updated_by' => auth()->user()->name ?? null,
        ]);

        return back()->with('success', 'เปลี่ยนสถานะเรียบร้อยแล้ว');
    }
}
