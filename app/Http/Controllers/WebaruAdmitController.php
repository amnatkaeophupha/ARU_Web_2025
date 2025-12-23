<?php

namespace App\Http\Controllers;

use App\Models\WebaruAdmitcycle;
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
            $data['files'] = $request->file('files')->store('2025_webaru_home_admitcycle', 'public');
        }

        WebaruAdmitcycle::create($data);
        return redirect()->back()->with('success', 'เพิ่มรอบการรับสมัครเรียบร้อยแล้ว');
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
        $item = WebaruAdmitcycle::findOrFail($id);
        return view('admin.2025_webaru_home_admit-edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebaruAdmit $webaruAdmit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebaruAdmit $webaruAdmit)
    {
        //
    }
}
