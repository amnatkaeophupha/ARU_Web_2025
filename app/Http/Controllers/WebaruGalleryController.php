<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Webarugallery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

            $galleryId = $gallery->id;
            // สร้าง folder ตาม id
            $folderPath = "2025_webaru_home_gallery_view/{$galleryId}";
            Storage::disk('public')->makeDirectory($folderPath);

            if ($gallery) {

                return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

            }else{

                return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
            }
        }
    }

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

        $folderPath = "2025_webaru_home_gallery_view/{$data_gallery->id}";

        // ลบทั้งโฟลเดอร์ (รวมไฟล์ทั้งหมด)
        if (Storage::disk('public')->exists($folderPath)) {
            Storage::disk('public')->deleteDirectory($folderPath);
        }

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

    /*  Gallery View */
    public function view($id)
    {
        $folder = "2025_webaru_home_gallery_view/$id";

        $files = Storage::disk('public')->exists($folder) ? Storage::disk('public')->files($folder): [];

        $gallery = Webarugallery::where('id',$id)->first();
        return view('admin.2025_webaru_home_gallery-view', compact('gallery', 'files'));
    }

    public function uploadImagesOnlyFile(Request $request)
    {
        $request->validate([
        'id' => ['required', 'integer'], // ถ้าไม่เช็ค DB ก็พอแค่นี้
        'files' => ['required', 'array'],
        'files.*' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:51200'], // 50MB
        ]);

    $id = (int) $request->id;

    // folder ตาม id
    $folderPath = "2025_webaru_home_gallery_view/{$id}";

    Storage::disk('public')->makeDirectory($folderPath);

        foreach ($request->file('files') as $file) {
            // ตั้งชื่อไฟล์กันชน
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = now()->format('YmdHis') . '_' . Str::random(8) . '.' . $ext;

            $file->storeAs($folderPath, $filename, 'public');
        }

        return redirect()->route('admin.webaru-galleries.view', $id)->with('success', 'อัปโหลดรูปเรียบร้อยแล้ว');
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'id'   => ['required', 'integer'],
            'file' => ['required', 'string'],
        ]);

        $id = (int) $request->id;

        // ป้องกัน path traversal: เอาเฉพาะชื่อไฟล์
        $filename = basename($request->file);

        $path = "2025_webaru_home_gallery_view/{$id}/{$filename}";

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return back()->with('success', 'ลบรูปเรียบร้อยแล้ว');
        }

        return back()->with('fail', 'ไม่พบไฟล์รูปที่ต้องการลบ');
    }
}
