<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebaruNews;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;


class WebaruNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $webaruNews = WebaruNews::orderBy('id', 'desc')->paginate(20);
         return view('admin.2025_webaru_home_arunews-grid', compact('webaruNews')) ;
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
        Cache::flush();

        // Define validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:6144', // 5MB Max
        ];
        // Define custom error messages (optional)
        $messages = [
            'title.required' => 'กรุณากรอกข้อมูลปีที่ ฉบัยที่ วันที่',
            'file.required' => 'ไฟล์เอกสารต้องเป็นไฟล์ประเภท PDF เท่านั้น.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with errors and old input
            return redirect('admin/webaru-arunews')->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $filePath = $file->storeAs('2025_webaru_home_arunews', $fileName, 'public'); // Upload to storage/app/public/aru_home_tab

        $webaruNews = WebaruNews::create([
            'title' => $request->title,
            'files' => $fileName,
            'status' => 1,
            'created_by' => Auth::user()->name
        ]);

        if ($webaruNews) {

            return redirect(url('admin/webaru-arunews'))->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        }else{

            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {

    }

    public function updateTitle(Request $request, string $id)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $news = WebaruNews::findOrFail($id);
        $news->title = $request->title;
        $news->updated_by = auth()->user()->name ?? null;
        $news->save();

        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());

            // Define validation rules
        $rules = ['file' => 'required|mimes:pdf|max:6144']; // 5MB Max
        // Define custom error messages (optional)
        $messages = ['file.required' => 'ไฟล์เอกสารต้องเป็นไฟล์ประเภท PDF เท่านั้น.',];

        $validator = Validator::make($request->all(), $rules, $messages);
        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with errors and old input
            return redirect('admin/webaru-arunews')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file')) {

            $webaru = WebaruNews::where('id',$request->id)->first();

            if($webaru->files != null)
            {
                $path = '2025_webaru_home_arunews/'.$webaru->files;
                if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
            }

            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('2025_webaru_home_arunews', $imageName, 'public');

            $webaru->files = $imageName;
            $webaru->updated_by = Auth::user()->name;

            if ($webaru->save()) {

                return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

            }else{

                return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = WebaruNews::where('id',$id)->first();

        if($data->files != null)
        {
            $path = '2025_webaru_home_arunews/'.$data->files;
            if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
        }

        $webaru = WebaruNews::findOrFail($id);

        if ($webaru) {

            $webaru->delete();

            return response()->json(['success' => 'ลบข้อมูลสำเร็จ']);
        }

        return response()->json(['error' => 'ไม่พบข้อมูล'], 404);
    }
}
