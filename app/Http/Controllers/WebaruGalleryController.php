<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Webarugallery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class WebaruGalleryController extends Controller
{

    public function index()
    {
         $galleries = Webarugallery::orderBy('id', 'desc')->paginate(20);
         return view('admin.2025_webaru_home_gallery-grid', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'dd' => 'required|string|max:2',
            'mm' => 'required|string|max:2',
            'yy' => 'required|string|max:4',
            'by' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {


            // $start_date = $request->input('dd') . '-' . $request->input('mm') . '-' . $request->input('yy');
            $start_date = Carbon::createFromDate($request->input('yy'),$request->input('mm'),$request->input('dd'))->format('Y-m-d');

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('2025_webaru_home_gallery', $imageName, 'public');

            $gallery = new Webarugallery();
            $gallery->title = $request->input('title');
            $gallery->start_date = $start_date;
            $gallery->by = $request->input('by');
            $gallery->image = $imageName;
            $gallery->status = 1;
            $gallery->created_by = Auth::user()->name;
            $gallery->save();

            if ($gallery) {

                return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

            }else{

                return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
            }
        }
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        // 1) Validate ข้อมูล
        $request->validate([
            'dd'    => 'required|string',
            'mm'    => 'required|string',
            'yy'    => 'required|integer|min:2500|max:2600', // พ.ศ.
            'title' => 'required|string|max:255',
            'by'    => 'required|string|max:255',
        ]);

        // 2) แปลงวันที่ พ.ศ. -> ค.ศ. (MySQL)
        $start_date = Carbon::createFromDate(
            $request->yy,
            $request->mm,
            $request->dd
        )->format('Y-m-d');

        // 3) Update ข้อมูล
        $updated = WebaruGallery::where('id', $id)->update([
            'start_date' => $start_date,
            'title'      => $request->title,
            'by'         => $request->by,
        ]);

        // 4) redirect กลับหน้า index
        if ($updated) {
            return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        }else{

            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }
    }

    public function destroy(string $id)
    {
        $data_gallery = Webarugallery::where('id',$id)->first();

        if($data_gallery->image != null)
        {
            $path = '2025_webaru_home_gallery/'.$data_gallery->image;
            if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
        }

        $data_gallery = Webarugallery::findOrFail($id);
        $data_gallery->delete();
        return back()->with('success','You have Deleted successfuly');

    }

    public function updateImage(Request $request, $id)
    {
        //dd($request->all());
        $data = WebaruGallery::where('id',$id)->first();

        if($data->image != null){
            $path = '2025_webaru_home_gallery/'.$data->image;
            if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $filePath = $image->storeAs('2025_webaru_home_gallery', $imageName, 'public');

        $data->image = $imageName;
        $data->updated_by = Auth::user()->name;

        if ($data->save()) {

            return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

        }else{

            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }
    }


}
