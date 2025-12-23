<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebaruTabController;
use App\Http\Controllers\WebaruNewsController;
use App\Http\Controllers\WebaruCarouselsController;
use App\Http\Controllers\WebaruSliderController;
use App\Http\Controllers\WebaruGalleryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\CustomVerificationController;
use App\Models\WebaruTab;
use App\Http\Controllers\WebaruAdmitController;

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
    Route::post('webaru-carousels/status', [WebaruCarouselsController::class, 'status']);

    Route::resource('webaru-sliders', WebaruSliderController::class);
    Route::post('webaru-sliders/status', [WebaruSliderController::class, 'status']);

    Route::resource('webaru-arunews', WebaruNewsController::class);
    Route::post('webaru-arunews/updateTitle/{id}', [WebaruNewsController::class, 'updateTitle']);

    Route::resource('webaru-galleries', WebaruGalleryController::class);
    Route::post('webaru-galleries/{id}/image', [WebaruGalleryController::class, 'updateImage'])->name('webaru-galleries.updateImage');
    Route::get('webaru-galleries/view/{id}', [WebaruGalleryController::class, 'view'])->name('admin.webaru-galleries.view');
    Route::post('admin/webaru-galleries/upload-images', [WebaruGalleryController::class, 'uploadImagesOnlyFile'])->name('admin.webaru-galleries.upload-images');
    Route::delete('admin/webaru-galleries/delete-image', [WebaruGalleryController::class, 'deleteImage'])->name('admin.webaru-galleries.delete-image');


    Route::get('webaru-admit', [WebaruAdmitController::class, 'index']);
    Route::post('webaru-admit', [WebaruAdmitController::class, 'store']);
    Route::get('webaru-admit/edit/{id}', [WebaruAdmitController::class, 'edit'])->name('admin.webaru-admit.edit');

});
