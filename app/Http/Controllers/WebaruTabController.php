<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\WebaruTab;
use App\Models\WebaruTabCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class WebaruTabController extends Controller
{

    public function index()
    {
        $params = ['tid' => 1];
        $categories = WebaruTabCategory::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();
        $data_tab = WebaruTab::where('type', $params['tid'])
            ->latest()
            ->paginate(30);
        return view('admin.2025_webaru_home_tabs-grid', compact('params', 'data_tab', 'categories'));
    }

    public function show(Request $request, $tid)
    {
        $params = $request->route()->parameters();

        try {
            $categories = WebaruTabCategory::where('is_active', 1)
                ->orderBy('sort_order')
                ->get();
            $data_tab = WebaruTab::where('type', $tid)
                ->orderBy('id', 'desc')
                ->latest()
                ->paginate(30);
            return view('admin.2025_webaru_home_tabs-grid', compact('params', 'data_tab', 'categories'));

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Record not found
            return response()->json(['error' => 'Record not found for type: ' . $tid], 404);
        }
    }

    public function store(Request $request)
    {
        Cache::flush();

        // Define validation rules
        $rules = [
            'type' => 'required|max:255',
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:6144', // 5MB Max
        ];
        // Define custom error messages (optional)
        $messages = [
            'type.required' => 'กรุณาเลือกประเภทประกาศ.',
            'title.required' => 'กรุณากรอกข้อมูลหัวข้อประกาศ.',
            'file.required' => 'ไฟล์เอกสารต้องเป็นไฟล์ประเภท PDF, DOC, DOCX, XLS, XLSX เท่านั้น.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with errors and old input
            return redirect('admin/webaru-tabs')->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $filePath = $file->storeAs('2025_webaru_home_tab', $fileName, 'public'); // Upload to storage/app/public/aru_home_tab

        $webaruTab = WebaruTab::create([
            'type' => $request->type,
            'title' => $request->title,
            'files' => $fileName,
            'active' => 0,
            'created_by' => Auth::user()->name
        ]);

        if ($webaruTab) {

            return redirect(url('admin/webaru-tabs/'.$request->type))->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        }else{

            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }
    }

    public function update(Request $request)
    {
        Cache::flush();
        // Define validation rules
        $rules = [
            'type' => 'required|max:255',
            'title' => 'required|string|max:255',
        ];
        // Define custom error messages (optional)
        $messages = [
            'type.required' => 'กรุณาเลือกประเภทประกาศ.',
            'title.required' => 'กรุณากรอกข้อมูลหัวข้อประกาศ.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with errors and old input
            return redirect('admin/webaru-tabs/'.$request->type)->withErrors($validator)->withInput();
        }

        $data_tab = WebaruTab::find($request->id);
        $data_tab->type = $request->type;
        $data_tab->title = $request->title;
        $data_tab->updated_by = Auth::user()->name;
        $data_tab->save();

        if ($data_tab) {
            return redirect(url('admin/webaru-tabs/'.$request->type))->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
        }else{
            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }
    }

    public function destroy(string $id)
    {

        $data_tab = WebaruTab::where('id',$id)->first();

        if($data_tab->files != null)
        {
            $path = '2025_webaru_home_tab/'.$data_tab->files;
            if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
        }

        $data_tab = WebaruTab::findOrFail($id);
        $data_tab->delete();
        return back()->with('success','You have Deleted successfuly');
    }

    public function upload(Request $request)
    {
        $rules = ['files' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:6144']; // 5MB Max
        $messages = ['files.required' => 'ไฟล์เอกสารต้องเป็นไฟล์ประเภท PDF, DOC, DOCX, XLS, XLSX เท่านั้น.'];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // Redirect back with errors and old input
            return redirect('admin/webaru-tabs/'.$request->type)->withErrors($validator)->withInput();
        }

        Cache::flush();

        $data_tab = WebaruTab::where('id',$request->id)->first();

        if($data_tab->files != null)
        {
            $path = '2025_webaru_home_tab/'.$data_tab->files;
            if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
        }

        $file = $request->file('files');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $filePath = $file->storeAs('2025_webaru_home_tab', $fileName, 'public'); // Upload to storage/app/public/aru_home_tab

        $data_tab->files = $fileName;
        $data_tab->updated_by = Auth::user()->name;
        $data_tab->save();

        if ($data_tab) {
            return redirect(url('admin/webaru-tabs/'.$request->type))->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
        }else{
            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }
    }

    public function active(Request $request)
    {
        Cache::flush();
        $data_tab = WebaruTab::find($request->id);
        $data_tab->active = $request->active;
        $data_tab->updated_by = Auth::user()->name;
        $data_tab->save();

        if ($data_tab) {
            return redirect(url('admin/webaru-tabs/'.$request->type))->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
        }else{
            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }
    }

}
