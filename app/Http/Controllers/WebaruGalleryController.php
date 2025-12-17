<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Webarugallery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class WebaruGalleryController extends Controller
{

    public function index()
    {
         $galleries = Webarugallery::orderBy('id', 'desc')->paginate(20);
         return view('admin.2025_webaru_home_gallery-grid', compact('galleries'));
    }

    // public function index()
    // {
    //     // ทดสอบง่าย ๆ ก่อน
    //     return view('webaru_bs3.gallery');
    // }
}
