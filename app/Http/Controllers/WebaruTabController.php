<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\WebaruTab;

class WebaruTabController extends Controller
{

    public function index()
    {
        return view('admin.tabs-grid');
    }

    public function store(Request $request)
    {
       //dd($request->all());
        $request->validate(['type'=> 'required','title'=> 'required']);

        Cache::flush();

        // Store data in the webaru_tabs table
        $webaruTab = WebaruTab::create([
            'type' => $request->type,
            'title' => $request->title,
            'active' => 0,
            'created_by' => Auth::user()->name
        ]);

        if ($webaruTab) {

            return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        }else{

            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }

    }
}
