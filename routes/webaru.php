<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('webaru_bs3.home');});
Route::get('/intro', function () { return view('webaru_bs3.intro');});
Route::get('/videointro', function () { return view('webaru_bs3.videointro');});
Route::get('/symbol', function () { return view('webaru_bs3.symbol');});
