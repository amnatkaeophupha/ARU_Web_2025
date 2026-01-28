<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebaruExecGroupController;
use App\Http\Controllers\Admin\WebaruTabController;
use App\Http\Controllers\Admin\WebaruNewsController;
use App\Http\Controllers\Admin\WebaruExecPositionController;
use App\Http\Controllers\Admin\WebaruExecExecutiveController;
use App\Http\Controllers\Admin\WebaruCarouselsController;
use App\Http\Controllers\Admin\WebaruSliderController;
use App\Http\Controllers\Admin\WebaruGalleryController;
use App\Http\Controllers\WebaruFaqQuestionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\CustomVerificationController;
use App\Models\WebaruTab;
use App\Http\Controllers\Admin\WebaruAdmitController;

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
    Route::post('webaru-galleries/status', [WebaruGalleryController::class, 'status']);
    Route::post('webaru-galleries/{id}/image', [WebaruGalleryController::class, 'updateImage'])->name('webaru-galleries.updateImage');
    Route::get('webaru-galleries/view/{id}', [WebaruGalleryController::class, 'view'])->name('admin.webaru-galleries.view');
    Route::post('admin/webaru-galleries/upload-images', [WebaruGalleryController::class, 'uploadImagesOnlyFile'])->name('admin.webaru-galleries.upload-images');
    Route::delete('admin/webaru-galleries/delete-image', [WebaruGalleryController::class, 'deleteImage'])->name('admin.webaru-galleries.delete-image');
    Route::delete('admin/webaru-galleries/delete-images', [WebaruGalleryController::class, 'deleteImages'])->name('admin.webaru-galleries.delete-images');

/**    Start Database system Student Admit  */
    Route::get('webaru-admit', [WebaruAdmitController::class, 'index']);
    Route::post('webaru-admit', [WebaruAdmitController::class, 'store']);
    Route::get('webaru-admit/edit/{id}', [WebaruAdmitController::class, 'edit'])->name('admin.webaru-admit.edit');
    route::put('webaru-admit/update/{id}', [WebaruAdmitController::class, 'update'])->name('admin.webaru-admit.update');
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

    Route::get('webaru-exec-groups', [WebaruExecGroupController::class, 'index']);
    Route::patch('webaru-exec-groups/{id}/toggle', [WebaruExecGroupController::class, 'toggleActive'])->name('webaru-exec-groups.toggle');
    Route::post('webaru-exec-groups', [WebaruExecGroupController::class, 'store_exec_groups'])->name('store_exec_groups');
    Route::put('webaru-exec-groups/{id}', [WebaruExecGroupController::class, 'update_exec_groups'])->name('update_exec_groups');
    Route::delete('webaru-exec-groups/{id}', [WebaruExecGroupController::class, 'destroy_exec_groups'])->name('webaru-exec-groups.destroy');

    Route::get('webaru-exec-positions', [WebaruExecPositionController::class, 'index'])->name('webaru-exec-positions.index');
    Route::post('webaru-exec-positions', [WebaruExecPositionController::class, 'store'])->name('webaru-exec-positions.store');
    Route::put('webaru-exec-positions/{id}', [WebaruExecPositionController::class, 'update'])->name('webaru-exec-positions.update');
    Route::patch('webaru-exec-positions/{id}/toggle', [WebaruExecPositionController::class, 'toggleActive'])->name('webaru-exec-positions.toggle');
    Route::delete('webaru-exec-positions/{id}', [WebaruExecPositionController::class, 'destroy'])->name('webaru-exec-positions.destroy');

    Route::get('webaru-exec-executives', [WebaruExecExecutiveController::class, 'index'])->name('webaru-exec-executives.index');
    Route::post('webaru-exec-executives', [WebaruExecExecutiveController::class, 'store'])->name('webaru-exec-executives.store');
    Route::put('webaru-exec-executives/{id}', [WebaruExecExecutiveController::class, 'update'])->name('webaru-exec-executives.update');
    Route::patch('webaru-exec-executives/{id}/toggle', [WebaruExecExecutiveController::class, 'toggleActive'])->name('webaru-exec-executives.toggle');
    Route::delete('webaru-exec-executives/{id}', [WebaruExecExecutiveController::class, 'destroy'])->name('webaru-exec-executives.destroy');

    Route::get('webaru-faq', [WebaruFaqQuestionController::class, 'adminIndex'])->name('admin.webaru-faq.index');
    Route::get('webaru-faq/{id}/answer', [WebaruFaqQuestionController::class, 'adminShow'])->name('admin.webaru-faq.answer');
    Route::post('webaru-faq/{id}/answer', [WebaruFaqQuestionController::class, 'adminStoreAnswer'])->name('admin.webaru-faq.answers.store');
    Route::patch('webaru-faq/{id}/answers/{answerId}/publish', [WebaruFaqQuestionController::class, 'adminPublishAnswer'])->name('admin.webaru-faq.answers.publish');
    Route::patch('webaru-faq/{id}/answers/{answerId}/hide', [WebaruFaqQuestionController::class, 'adminHideAnswer'])->name('admin.webaru-faq.answers.hide');
    Route::patch('webaru-faq/{id}/answers/{answerId}/spam', [WebaruFaqQuestionController::class, 'adminToggleSpamAnswer'])->name('admin.webaru-faq.answers.spam');
    Route::put('webaru-faq/{id}/answers/{answerId}', [WebaruFaqQuestionController::class, 'adminUpdateAnswer'])->name('admin.webaru-faq.answers.update');
    Route::delete('webaru-faq/{id}/answers/{answerId}', [WebaruFaqQuestionController::class, 'adminDestroyAnswer'])->name('admin.webaru-faq.answers.destroy');
    Route::patch('webaru-faq/{id}/publish', [WebaruFaqQuestionController::class, 'adminPublish'])->name('admin.webaru-faq.publish');
    Route::patch('webaru-faq/{id}/hide', [WebaruFaqQuestionController::class, 'adminHide'])->name('admin.webaru-faq.hide');
    Route::patch('webaru-faq/{id}/spam', [WebaruFaqQuestionController::class, 'adminToggleSpam'])->name('admin.webaru-faq.spam');
    Route::delete('webaru-faq/{id}', [WebaruFaqQuestionController::class, 'adminDestroy'])->name('admin.webaru-faq.destroy');
});
