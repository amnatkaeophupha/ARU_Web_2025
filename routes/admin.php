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

/**    Start Database system Student Admit  */
    Route::get('webaru-admit', [WebaruAdmitController::class, 'index']);
    Route::post('webaru-admit', [WebaruAdmitController::class, 'store']);
    Route::get('webaru-admit/edit/{id}', [WebaruAdmitController::class, 'edit'])->name('admin.webaru-admit.edit');

    Route::post('webaru-admit/{id}/file-detail',[WebaruAdmitController::class, 'admincycle_file_detail_store']);
    Route::delete('webaru-admit/file-detail/{id}',[WebaruAdmitController::class, 'admincycle_file_detail_destroy']);
    Route::delete('webaru-admit/{id}', [WebaruAdmitController::class, 'destroy'])->name('webaru-admit.destroy');
    Route::patch('webaru-admit/{id}/toggle',[WebaruAdmitController::class, 'toggleActive']);

    //Route::get('webaru-admit/view/{id}', [WebaruAdmitController::class, 'view'])->name('admin.webaru-admit.view');
    Route::get('webaru-admit/view/{cycleId}', [WebaruAdmitController::class, 'viewByCycle']);
    Route::post('webaru-admit/view/{cycleId}/attach-programs', [WebaruAdmitController::class, 'attachProgramsToCycle']);
    Route::post('webaru-admit/view/{cycleId}/program/{programId}/upload',[WebaruAdmitController::class, 'admitViewUpload']);
    Route::delete('webaru-admit/view/{id}',[WebaruAdmitController::class, 'destroyView']);

    Route::get('webaru-admit/view/{cycleId}/faculty/{facultyId}/comment',[WebaruAdmitController::class, 'viewComment']);
    Route::post('webaru-admit/view/{cycle}/faculty/{faculty}/comment',[WebaruAdmitController::class, 'storeFacultyComment']);
    Route::delete('webaru-admit/view-comment/{id}',[WebaruAdmitController::class, 'deleteViewComment']);
    /**  เพิ่มลบหลักสูตรที่จะประกาศผลของแต่ละคณะ */
    Route::get('webaru-admit/course/{faculty}', [WebaruAdmitController::class,'course'])->name('webaru.admit.course');
    Route::post('webaru-admit/course/{faculty}/program', [WebaruAdmitController::class, 'programStore']);
    Route::put('webaru-admit/program/{id}', [WebaruAdmitController::class, 'programUpdate']);
    Route::delete('webaru-admit/program/{id}',[WebaruAdmitController::class, 'programDestroy'])->name('webaru-admit.program.destroy');

/**  End Student Admit */


});
