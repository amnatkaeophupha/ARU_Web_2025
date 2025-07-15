<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('webaru_bs3.home');});
Route::get('/intro', function () { return view('webaru_bs3.intro');});
Route::get('/videointro', function () { return view('webaru_bs3.videointro');});
Route::get('/symbol', function () { return view('webaru_bs3.symbol');});
Route::get('/strategic', function () { return view('webaru_bs3.strategic');});
Route::get('/map', function () { return view('webaru_bs3.map');});
Route::get('/structure', function () { return view('webaru_bs3.structure');});
Route::get('/administrators', function () { return view('webaru_bs3.administrators');});
