<?php

namespace App\Http\Controllers;

use App\Models\WebaruTabCategory;
use App\Models\WebaruTab;
use App\Models\WebaruNews;
use App\Models\WebaruCarousel;
use App\Models\WebaruSlider;
use App\Models\WebaruAdmitCycle;
use App\Models\WebaruAdmitFaculty;
use App\Models\Webarugallery;
use Illuminate\Support\Facades\Storage;

class WebaruHomePublicController extends Controller
{
    public function index()
    {
        $tabCategories = WebaruTabCategory::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $categoryIds = $tabCategories->pluck('id');
        $tabsByCategory = WebaruTab::whereIn('type', $categoryIds)
            ->where('active', 1)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('type');

        $arunews = WebaruNews::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $carousels = WebaruCarousel::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $sliders = WebaruSlider::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        $galleries = Webarugallery::where('status', 1)
            ->orderBy('start_date', 'desc')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('webaru_bs5.home', compact('tabCategories', 'tabsByCategory', 'arunews', 'carousels', 'sliders', 'galleries'));
    }

    public function admitIndex()
    {
        $cycles = WebaruAdmitCycle::query()
            ->where('is_active', true)
            ->orderByDesc('year')
            ->orderByDesc('id')
            ->get();

        return view('webaru_bs5.admit_index', compact('cycles'));
    }

    public function admitShow($id)
    {
        $cycle = WebaruAdmitCycle::with(['fileDetails' => function ($q) {
            $q->orderBy('id', 'desc');
        }])->findOrFail($id);

        $faculties = WebaruAdmitFaculty::query()
            ->orderBy('id', 'asc')
            ->with([
                'programs' => function ($q) use ($id) {
                    $q->orderBy('program_code', 'asc');
                },
                'programs.admitViews' => function ($q) use ($id) {
                    $q->where('webaru_admit_cycle_id', $id)
                      ->orderByDesc('id');
                },
                'viewComments' => function ($q) use ($id) {
                    $q->where('webaru_admit_cycle_id', $id)
                      ->orderByDesc('id');
                },
            ])
            ->get();

        return view('webaru_bs5.admit_view', compact('cycle', 'faculties'));
    }

    public function galleryView($id)
    {
        $folder = "2025_webaru_home_gallery_view/{$id}";
        $files = Storage::disk('public')->exists($folder)
            ? Storage::disk('public')->files($folder)
            : [];

        $gallery = Webarugallery::where('id', $id)->first();

        return view('webaru_bs5.gallery_view', compact('gallery', 'files'));
    }
}
