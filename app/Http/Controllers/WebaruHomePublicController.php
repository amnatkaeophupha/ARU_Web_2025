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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
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

        $gallery = Webarugallery::findOrFail($id);
        if (Schema::hasColumn('webaru_galleries', 'view_count')) {
            $gallery->increment('view_count');
            $gallery->refresh();
        }

        return view('webaru_bs5.gallery_view', compact('gallery', 'files'));
    }

    public function aruNews(Request $request)
    {
        $yearInput = $request->query('year');
        $year = null;

        $baseQuery = WebaruNews::query()
            ->where('status', 1);

        $yearOptions = (clone $baseQuery)
            ->selectRaw('YEAR(created_at) as year')
            ->whereNotNull('created_at')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->filter()
            ->values();

        if (!empty($yearInput) && ctype_digit((string) $yearInput)) {
            $parsedYear = (int) $yearInput;
            // Support both CE and Thai BE years from query.
            if ($parsedYear >= 2400) {
                $parsedYear -= 543;
            }

            if ($parsedYear >= 1900 && $parsedYear <= 2600) {
                $baseQuery->whereYear('created_at', $parsedYear);
                $year = $parsedYear;
            }
        }

        $newsItems = $baseQuery
            ->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('webaru_bs5.aru_new', compact('newsItems', 'yearOptions', 'year'));
    }

    public function announcementIndex(Request $request)
    {
        $tabCategories = WebaruTabCategory::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $selectedCategoryId = (int) $request->query('category', 0);
        if ($selectedCategoryId <= 0 || !$tabCategories->contains('id', $selectedCategoryId)) {
            $selectedCategoryId = (int) optional($tabCategories->first())->id;
        }

        $announcementItems = WebaruTab::query()
            ->where('active', 1)
            ->when($selectedCategoryId > 0, function ($query) use ($selectedCategoryId) {
                $query->where('type', $selectedCategoryId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('webaru_bs5.announcement', compact('tabCategories', 'selectedCategoryId', 'announcementItems'));
    }

    public function galleryPast(Request $request)
    {
        $yearInput = $request->query('year');
        $year = null;

        $baseQuery = Webarugallery::query()
            ->where('status', 1);

        $yearOptions = (clone $baseQuery)
            ->selectRaw('YEAR(start_date) as year')
            ->whereNotNull('start_date')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->filter()
            ->values();

        if (!empty($yearInput) && ctype_digit((string) $yearInput)) {
            $parsedYear = (int) $yearInput;
            $availableYears = $yearOptions->map(fn ($y) => (int) $y);
            $candidateYears = collect([$parsedYear]);

            // Support both CE/BE input without assuming DB year system.
            if ($parsedYear >= 2400) {
                $candidateYears->push($parsedYear - 543);
            } else {
                $candidateYears->push($parsedYear + 543);
            }

            $selectedYear = $candidateYears
                ->first(fn ($candidate) => $availableYears->contains((int) $candidate));

            if ($selectedYear !== null) {
                $baseQuery->whereYear('start_date', (int) $selectedYear);
                $year = (int) $selectedYear;
            }
        }

        $galleries = $baseQuery
            ->orderBy('start_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('webaru_bs5.gallery_past', compact('galleries', 'yearOptions', 'year'));
    }
}
