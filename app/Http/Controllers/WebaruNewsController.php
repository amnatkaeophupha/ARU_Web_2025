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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
