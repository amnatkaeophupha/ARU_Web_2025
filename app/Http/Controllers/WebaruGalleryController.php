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
use Intervention\Image\Laravel\Facades\Image;

class WebaruGalleryController extends Controller
{

    public function index()
    {
         $galleries = Webarugallery::orderBy('start_date', 'desc')->orderBy('id', 'desc')->paginate(20);
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
    $thumbFolderPath = "{$folderPath}/thumbs";

    Storage::disk('public')->makeDirectory($folderPath);
    Storage::disk('public')->makeDirectory($thumbFolderPath);

        foreach ($request->file('files') as $file) {
            // ตั้งชื่อไฟล์กันชน
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = now()->format('YmdHis') . '_' . Str::random(8) . '.' . $ext;

            // อ่านรูป
            $image = Image::read($file)->orient();

            // ปรับขนาด: ด้านยาวสุด = 1200px และรักษาอัตราส่วน
            $maxSide = 1200;
            $image->scaleDown($maxSide, $maxSide);

           // บันทึกไฟล์ลง storage/app/public/...
            $savePath = storage_path("app/public/{$folderPath}/{$filename}");
            $image->save($savePath, quality: 85);

            // สร้าง thumbnail เพื่อลดน้ำหนักหน้าแกลเลอรี
            $thumb = clone $image;
            $thumb->scaleDown(400, 400);
            $thumbSavePath = storage_path("app/public/{$thumbFolderPath}/{$filename}");
            $thumb->save($thumbSavePath, quality: 80);

            //$file->storeAs($folderPath, $filename, 'public');
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
        $thumbPath = "2025_webaru_home_gallery_view/{$id}/thumbs/{$filename}";

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            if (Storage::disk('public')->exists($thumbPath)) {
                Storage::disk('public')->delete($thumbPath);
            }
            return back()->with('success', 'ลบรูปเรียบร้อยแล้ว');
        }

        return back()->with('fail', 'ไม่พบไฟล์รูปที่ต้องการลบ');
    }

    public function deleteImages(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
            'files' => ['required', 'array'],
            'files.*' => ['required', 'string'],
        ]);

        $id = (int) $request->id;
        $deleted = 0;
        $files = $request->input('files', []);

        foreach ($files as $file) {
            $filename = basename($file);
            $path = "2025_webaru_home_gallery_view/{$id}/{$filename}";
            $thumbPath = "2025_webaru_home_gallery_view/{$id}/thumbs/{$filename}";

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
                $deleted++;
            }
            if (Storage::disk('public')->exists($thumbPath)) {
                Storage::disk('public')->delete($thumbPath);
            }
        }

        if ($deleted > 0) {
            return back()->with('success', "ลบรูปที่เลือกเรียบร้อยแล้ว ({$deleted} รูป)");
        }

        return back()->with('fail', 'ไม่พบไฟล์รูปที่ต้องการลบ');
    }

    public function publicView($id)
    {
        $folder = "2025_webaru_home_gallery_view/$id";

        $files = Storage::disk('public')->exists($folder) ? Storage::disk('public')->files($folder) : [];

        $gallery = Webarugallery::where('id', $id)->first();

        return view('webaru_bs5.gallery_view', compact('gallery', 'files'));
    }

    public function status(Request $request)
    {
        Cache::flush();

        $request->validate([
            'id' => ['required', 'integer'],
            'status' => ['required', 'integer', 'in:0,1'],
        ]);

        $gallery = Webarugallery::find($request->id);
        if (!$gallery) {
            return back()->with('fail','ไม่พบข้อมูล');
        }

        $gallery->status = $request->status;
        $gallery->updated_by = Auth::user()->name;
        $gallery->save();

        return redirect(url('admin/webaru-galleries'))->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
