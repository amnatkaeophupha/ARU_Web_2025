<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebaruGalleryController;
use App\Http\Controllers\WebaruAdmitController;

Route::get('/', function () { return view('webaru_bs3.home');});
Route::get('/intro', function () { return view('webaru_bs3.intro');});
Route::get('/videointro', function () { return view('webaru_bs3.videointro');});
Route::get('/symbol', function () { return view('webaru_bs3.symbol');});
Route::get('/strategic', function () { return view('webaru_bs3.strategic');});
Route::get('/map', function () { return view('webaru_bs3.map');});
Route::get('/structure', function () { return view('webaru_bs3.structure');});
Route::get('/administrators', function () { return view('webaru_bs3.administrators');});

Route::get('/gallery', [WebaruGalleryController::class, 'index'])->name('gallery');

Route::get('/admit', [WebaruAdmitController::class, 'frontendIndex']);
Route::get('/admit/{id}', [WebaruAdmitController::class, 'show']);

