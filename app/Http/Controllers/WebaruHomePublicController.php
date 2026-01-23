<?php

namespace App\Http\Controllers;

use App\Models\WebaruTabCategory;
use App\Models\WebaruTab;
use App\Models\WebaruNews;
use App\Models\WebaruCarousel;
use App\Models\WebaruSlider;

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

        return view('webaru_bs5.home', compact('tabCategories', 'tabsByCategory', 'arunews', 'carousels', 'sliders'));
    }
}
