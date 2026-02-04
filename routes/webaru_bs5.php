<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WebaruGalleryController;
use App\Http\Controllers\WebaruExecutivePublicController;
use App\Http\Controllers\WebaruFaqQuestionController;
use App\Http\Controllers\WebaruHomePublicController;
use App\Http\Controllers\WebaruComplaintPublicController;

Route::get('/', [WebaruHomePublicController::class, 'index'])->name('home.index');
Route::get('/intro', function () { return view('webaru_bs5.intro');});
Route::get('/videointro', function () { return view('webaru_bs5.videointro');});
Route::get('/symbol', function () { return view('webaru_bs5.symbol');});
Route::get('/strategic', function () { return view('webaru_bs5.strategic');});
Route::get('/map', function () { return view('webaru_bs5.map');});
Route::get('/structure', function () { return view('webaru_bs5.structure');});

Route::get('/executives', [WebaruExecutivePublicController::class, 'index'])->name('executives.index');
Route::get('/gallery/{id}', [WebaruHomePublicController::class, 'galleryView'])->name('gallery.view');
Route::get('/admit', [WebaruHomePublicController::class, 'admitIndex'])->name('admit.index');
Route::get('/admit/{id}', [WebaruHomePublicController::class, 'admitShow'])->name('admit.show');


Route::get('/faq', [WebaruFaqQuestionController::class, 'index'])->name('faq.index');
Route::get('/faq/view/{id}', [WebaruFaqQuestionController::class, 'show'])->name('faq.view');
Route::get('/faq/ask', function () { return view('webaru_bs5.faq_create'); })->name('faq.create');

Route::post('/faq/ask', [WebaruFaqQuestionController::class, 'store'])->middleware('throttle:10,1');

Route::prefix('complaint')->name('complaint.')->group(function () {
    Route::get('/', [WebaruComplaintPublicController::class, 'index'])->name('index');

    Route::get('/privacy-policy', function () { return view('webaru_bs5.complaints.privacy-policy'); })->name('privacy');
    Route::get('/tracking', [WebaruComplaintPublicController::class, 'tracking'])->name('tracking');

    Route::get('/success', [WebaruComplaintPublicController::class, 'success'])
        ->name('success');

    Route::get('/{type}', [WebaruComplaintPublicController::class, 'create'])
        ->where('type', 'grievance|opinion|corruption|direct')
        ->name('create');

    Route::post('/', [WebaruComplaintPublicController::class, 'store'])
        ->name('store');
});
