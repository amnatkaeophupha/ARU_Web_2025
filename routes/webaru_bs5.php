<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebaruGalleryController;
use App\Http\Controllers\WebaruAdmitController;
use App\Http\Controllers\WebaruExecutivePublicController;
use App\Http\Controllers\WebaruHomePublicController;

// Route::get('/', function () { return view('webaru_bs5.default.index');});
// Route::get('/intro', function () { return view('webaru_bs5.intro');});
// Route::get('/videointro', function () { return view('webaru_bs5.videointro');});
// Route::get('/symbol', function () { return view('webaru_bs5.symbol');});
// Route::get('/strategic', function () { return view('webaru_bs5.strategic');});
// Route::get('/map', function () { return view('webaru_bs5.map');});
// Route::get('/structure', function () { return view('webaru_bs5.structure');});
// Route::get('/administrators', function () { return view('webaru_bs5.administrators');});

// Route::get('/gallery', [WebaruGalleryController::class, 'index'])->name('gallery');

// Route::get('/admit', [WebaruAdmitController::class, 'frontendIndex']);
// Route::get('/admit/{id}', [WebaruAdmitController::class, 'show']);


Route::get('/', [WebaruHomePublicController::class, 'index'])->name('home.index');
Route::get('/intro', function () { return view('webaru_bs5.intro');});
Route::get('/videointro', function () { return view('webaru_bs5.videointro');});
Route::get('/symbol', function () { return view('webaru_bs5.symbol');});
Route::get('/strategic', function () { return view('webaru_bs5.strategic');});
Route::get('/map', function () { return view('webaru_bs5.map');});
Route::get('/structure', function () { return view('webaru_bs5.structure');});
Route::get('/executives', [WebaruExecutivePublicController::class, 'index'])->name('executives.index');
Route::get('/administrators', function () { return view('webaru_bs5.administrators');});
