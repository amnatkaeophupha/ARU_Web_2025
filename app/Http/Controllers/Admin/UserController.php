<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::orderBy('name')->get();
        return view('admin.user-grid', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'mobile' =>'required|string|min:10|max:10',
            'password' =>'required|string|min:6',
            'role_name'=>'required|exists:roles,name',
        ]);

        if($request->active_users == 'on'){ $active = 1; }else{ $active = 0;}

        Cache::flush();

        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->mobile = trim($request->mobile);
        $user->password = trim($request->password); //Hash::make(password) in model User;
        $user->active = $active;
        $rec = $user->save();

        if ($rec) {
            // assign role (Spatie)
            $user->assignRole($request->role_name);

            event(new Registered($user));

            return back()->with('success','บันทึกผู้ใช้งานเรียบร้อยแล้ว');

        }else{

            return back()->with('fail','ไม่สามารถบันทึกผู้ใช้งานได้');
        }

    }


    public function update(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email' => 'required|email',
            'mobile' =>'required|string|min:10|max:10',
            'role_name'=>'required|exists:roles,name'
        ]);

        $user = User::where('id',$request->id)->first();

        if($user->email === $request->email){

            $user = User::find($request->id);
            $user->name = trim($request->name);
            $user->mobile = trim($request->mobile);
            $user->save();
            $user->syncRoles([$request->role_name]);

            return back()->with('success','อัปเดตผู้ใช้งานเรียบร้อยแล้ว');

        }else{

            $request->validate(['email'=> 'required|email|unique:users,email',]);

            $user = User::find($request->id);
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->mobile = trim($request->mobile);
            $user->save();
            $user->syncRoles([$request->role_name]);

            return back()->with('success','อัปเดตผู้ใช้งานเรียบร้อยแล้ว');
        }
    }

    public function SendVerifyMail(Request $request)
    {
        // Validate the email input
        $request->validate(['email' => 'required|email|exists:users,email',]);
        // Send the reset link
        $status = Password::sendResetLink($request->only('email'));
        // Check the status and return a response
        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'active' => 'required|boolean', // Ensure `active` is either 0 or 1
        ]);

        $user = User::findOrFail($id);
        $user->active = $request->active;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'อัปเดตสถานะผู้ใช้งานเรียบร้อยแล้ว',
        ]);
    }

    public function destroy(string $id)
    {
        if (Auth::id() == $id) {
            return back()->with('fail', 'ไม่สามารถลบผู้ใช้ตัวเองได้');
        }

        $user = User::where('id',$id)->first();

        if($user->avatar != null)
        {
            $path = public_path('webaru_bs5/avatars/'.$user->avatar);
            if (File::exists($path)) { File::delete($path); }
        }

        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success','ลบผู้ใช้งานเรียบร้อยแล้ว');
    }
}
