<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebaruSlider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class WebaruSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $sliders = WebaruSlider::orderBy('id', 'desc')->paginate(20);
         return view('admin.2025_webaru_home_sliders-grid', compact('sliders'));
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:6144' // 5MB Max
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('2025_webaru_home_sliders', $imageName, 'public');

            $webaru = WebaruSlider::create([
                'images' => $filePath,
                'link_url' => $request->link_url,
                'topic' => $request->topic,
                'title' => $request->title,
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->hasFile('image')) {

            $webaru = WebaruSlider::where('id',$request->id)->first();

            if($webaru->images != null)
            {
                $path = str_starts_with($webaru->images, '2025_webaru_home_sliders/')
                    ? $webaru->images
                    : '2025_webaru_home_sliders/'.$webaru->images;
                if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = $image->storeAs('2025_webaru_home_sliders', $imageName, 'public');

            $webaru->images = $filePath;
            $webaru->updated_by = Auth::user()->name;

            if ($webaru->save()) {

                return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

            }else{

                return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
            }
        }

        $webaru = WebaruSlider::where('id',$request->id)->first();
        if ($webaru) {
            $webaru->topic = $request->topic;
            $webaru->title = $request->title;
            $webaru->link_url = $request->link_url;
            $webaru->updated_by = Auth::user()->name;

            if ($webaru->save()) {
                return back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
            }

            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }

        return back()->with('fail','ไม่พบข้อมูล');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = WebaruSlider::where('id',$id)->first();

        if($data->images != null)
        {
            $path = '2025_webaru_home_sliders/'.$data->images;
            if (Storage::disk('public')->exists($path)) { Storage::disk('public')->delete($path);}
        }

        $slider = WebaruSlider::findOrFail($id);

        if ($slider) {

            $slider->delete();
            return response()->json(['success' => 'ลบข้อมูลสำเร็จ']);
        }

        return response()->json(['error' => 'ไม่พบข้อมูล'], 404);
    }


    public function status(Request $request)
    {
        Cache::flush();

        $webaru = WebaruSlider::find($request->id);
        $webaru->status = $request->status;
        $webaru->updated_by = Auth::user()->name;
        $webaru->save();

        if ($webaru) {
            return redirect(url('admin/webaru-sliders'))->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
        }else{
            return back()->with('fail','ไม่สามารถบันทึกข้อมูลได้');
        }
    }
}
