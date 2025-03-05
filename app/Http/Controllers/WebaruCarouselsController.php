<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WebaruCarousel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class WebaruCarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = WebaruCarousel::orderBy('id', 'desc')->paginate(20);
        return view('admin.2025_webaru_home_carousels-grid', compact('carousels'));
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
            'image' => 'required|image|mimes:jpg,png,jpeg|max:6144' // 5MB Max
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('2025_webaru_home_carousels', $imageName, 'public');

            $webaru = WebaruCarousel::create([
                'image_url' => $request->image_url,
                'images' => $imageName,
                'status' => 0,
                'created_by' => Auth::user()->name
            ]);

            if ($webaru) {

                return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

            }else{

                return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
            }
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
        $webaru = WebaruCarousel::find($id);

        if ($webaru) {
            $webaru->image_url = $request->image_url;
            $webaru->updated_by = Auth::user()->name;

            if ($webaru->save()) {

                return back()->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');

            }else{

                return back()->with('fail','ไม่สามารถแก้ไขข้อมูลได้');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = WebaruCarousel::where('id',$id)->first();

        if($data->images != null)
        {
            $path = '2025_webaru_home_carousels/'.$data->images;
            if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
        }

        $carousel = WebaruCarousel::findOrFail($id);

        if ($carousel) {

            $carousel->delete();

            return response()->json(['success' => 'ลบข้อมูลสำเร็จ']);
        }

        return response()->json(['error' => 'ไม่พบข้อมูล'], 404);
    }
}
