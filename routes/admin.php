<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebaruTabController;
use App\Http\Controllers\WebaruCarouselsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\CustomVerificationController;
use App\Models\WebaruTab;

Route::prefix('admin')->middleware(['role:admin','verified'])->group(function () {

    Route::get('/', function () { return view('admin.dashboard'); });
    Route::get('/profile', function () { return view('admin.user-profile'); });
    Route::post('/profile_images', [AuthController::class,'profile_images']);
    Route::post('/profile_update', [AuthController::class,'profile_update']);

    Route::get('/users', [UserController::class,'index']);
    Route::post('/users/store', [UserController::class,'store']);
    Route::post('/users/update', [UserController::class,'update']);
    Route::post('users/sendmail', [UserController::class, 'SendVerifyMail']);
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{id}/update-status', [UserController::class, 'updateStatus']);
    Route::get('/destroy', [AuthController::class, 'destroy']);
    /* Tabs Dashboard WebARU */
    route::get('webaru-tabs', [WebaruTabController::class, 'index']);
    Route::get('webaru-tabs/{tid}', [WebaruTabController::class, 'show']);
    Route::post('webaru-tabs', [WebaruTabController::class, 'store']);
    Route::post('webaru-tabs/update', [WebaruTabController::class, 'update']);
    Route::delete('webaru-tabs/{id}', [WebaruTabController::class, 'destroy'])->name('webaru-tabs.destroy');
    Route::post('webaru-tabs/upload', [WebaruTabController::class, 'upload']);
    route::post('webaru-tabs/active', [WebaruTabController::class, 'active']);
    /* carousels Dashboard WebARU */
    Route::resource('webaru-carousels', WebaruCarouselsController::class);
    route::post('webaru-carousels/status', [WebaruCarouselsController::class, 'status']);

});
