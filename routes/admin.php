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
use App\Http\Controllers\Admin\WebaruComplaintController;
use App\Http\Controllers\Admin\WebaruComplaintDirectController;
use App\Http\Controllers\Admin\WebaruAdmitController;

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'verified'])
    ->group(function () {

    // ===============================
    // Dashboard / Profile (ทุก role เข้าได้)
    // ===============================
    Route::get('/', fn () => view('admin.dashboard'));
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/profile_images', [AuthController::class,'profile_images']);
    Route::post('/profile_update', [AuthController::class,'profile_update']);
    Route::get('/destroy', [AuthController::class, 'destroy']);

    // ===============================
    // USERS (Admin เท่านั้น)
    // ===============================
    Route::middleware('permission:users.manage')->group(function () {
        Route::get('/users', [UserController::class,'index']);
        Route::post('/users/store', [UserController::class,'store']);
        Route::post('/users/update', [UserController::class,'update']);
        Route::post('users/sendmail', [UserController::class, 'SendVerifyMail']);
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('users/{id}/update-status', [UserController::class, 'updateStatus']);
    });

    // ===============================
    // หน้าแรกและสื่อ
    // ===============================

    // ผู้บริหารมหาวิทยาลัย
    Route::middleware('permission:webaru.exec_groups.manage')->group(function () {
        Route::get('webaru-exec-groups', [WebaruExecGroupController::class, 'index']);
        Route::patch('webaru-exec-groups/{id}/toggle', [WebaruExecGroupController::class, 'toggleActive'])->name('webaru-exec-groups.toggle');
        Route::post('webaru-exec-groups', [WebaruExecGroupController::class, 'store_exec_groups'])->name('store_exec_groups');
        Route::put('webaru-exec-groups/{id}', [WebaruExecGroupController::class, 'update_exec_groups'])->name('update_exec_groups');
        Route::delete('webaru-exec-groups/{id}', [WebaruExecGroupController::class, 'destroy_exec_groups'])->name('webaru-exec-groups.destroy');
    });

    // สไลด์ข่าว 1920
    Route::resource('webaru-sliders', WebaruSliderController::class)
        ->middleware('permission:webaru.sliders.manage');
    Route::post('webaru-sliders/status', [WebaruSliderController::class, 'status'])
        ->middleware('permission:webaru.sliders.manage');

    // สไลด์ข่าว 1440
    Route::resource('webaru-carousels', WebaruCarouselsController::class)
        ->middleware('permission:webaru.carousels.manage');
    Route::post('webaru-carousels/status', [WebaruCarouselsController::class, 'status'])
        ->middleware('permission:webaru.carousels.manage');

    // ข่าว ARU News
    Route::resource('webaru-arunews', WebaruNewsController::class)
        ->middleware('permission:webaru.arunews.manage');
    Route::post('webaru-arunews/updateTitle/{id}', [WebaruNewsController::class, 'updateTitle'])
        ->middleware('permission:webaru.arunews.manage');

    // คลังภาพกิจกรรม
    Route::resource('webaru-galleries', WebaruGalleryController::class)
        ->middleware('permission:webaru.galleries.manage');
    Route::post('webaru-galleries/status', [WebaruGalleryController::class, 'status'])
        ->middleware('permission:webaru.galleries.manage');
    Route::post('webaru-galleries/{id}/image', [WebaruGalleryController::class, 'updateImage'])
        ->middleware('permission:webaru.galleries.manage')
        ->name('webaru-galleries.updateImage');
    Route::get('webaru-galleries/view/{id}', [WebaruGalleryController::class, 'view'])
        ->middleware('permission:webaru.galleries.manage')
        ->name('admin.webaru-galleries.view');
    Route::post('admin/webaru-galleries/upload-images', [WebaruGalleryController::class, 'uploadImagesOnlyFile'])
        ->middleware('permission:webaru.galleries.manage')
        ->name('admin.webaru-galleries.upload-images');
    Route::delete('admin/webaru-galleries/delete-image', [WebaruGalleryController::class, 'deleteImage'])
        ->middleware('permission:webaru.galleries.manage')
        ->name('admin.webaru-galleries.delete-image');
    Route::delete('admin/webaru-galleries/delete-images', [WebaruGalleryController::class, 'deleteImages'])
        ->middleware('permission:webaru.galleries.manage')
        ->name('admin.webaru-galleries.delete-images');

    // ประกาศผลรับเข้า
    Route::middleware('permission:webaru.admit.manage')->group(function () {
        Route::get('webaru-admit', [WebaruAdmitController::class, 'index']);
        Route::post('webaru-admit', [WebaruAdmitController::class, 'store']);
        Route::get('webaru-admit/edit/{id}', [WebaruAdmitController::class, 'edit'])->name('admin.webaru-admit.edit');
        Route::put('webaru-admit/update/{id}', [WebaruAdmitController::class, 'update'])->name('admin.webaru-admit.update');
        Route::post('webaru-admit/{id}/file-detail',[WebaruAdmitController::class, 'admincycle_file_detail_store']);
        Route::delete('webaru-admit/file-detail/{id}',[WebaruAdmitController::class, 'admincycle_file_detail_destroy']);
        Route::delete('webaru-admit/{id}', [WebaruAdmitController::class, 'destroy'])->name('webaru-admit.destroy');
        Route::patch('webaru-admit/{id}/toggle',[WebaruAdmitController::class, 'toggleActive']);

        Route::get('webaru-admit/view/{cycleId}', [WebaruAdmitController::class, 'viewByCycle']);
        Route::post('webaru-admit/view/{cycleId}/attach-programs', [WebaruAdmitController::class, 'attachProgramsToCycle']);
        Route::post('webaru-admit/view/{cycleId}/program/{programId}/upload',[WebaruAdmitController::class, 'admitViewUpload']);
        Route::delete('webaru-admit/view/{id}',[WebaruAdmitController::class, 'destroyView']);

        Route::get('webaru-admit/view/{cycleId}/faculty/{facultyId}/comment',[WebaruAdmitController::class, 'viewComment']);
        Route::post('webaru-admit/view/{cycle}/faculty/{faculty}/comment',[WebaruAdmitController::class, 'storeFacultyComment']);
        Route::delete('webaru-admit/view-comment/{id}',[WebaruAdmitController::class, 'deleteViewComment']);
        Route::get('webaru-admit/course/{faculty}', [WebaruAdmitController::class,'course'])->name('webaru.admit.course');
        Route::post('webaru-admit/course/{faculty}/program', [WebaruAdmitController::class, 'programStore']);
        Route::put('webaru-admit/program/{id}', [WebaruAdmitController::class, 'programUpdate']);
        Route::delete('webaru-admit/program/{id}',[WebaruAdmitController::class, 'programDestroy'])->name('webaru-admit.program.destroy');
    });

    // FAQ
    Route::middleware('permission:webaru.faq.manage')->group(function () {
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

    // ===============================
    // TABS (แยก permission ตาม tab จริง)
    // ===============================
    Route::middleware('permission:webaru.tabs.pr.manage')->group(function () {
        Route::get('webaru-tabs', [WebaruTabController::class, 'index']);
        Route::get('webaru-tabs/1', [WebaruTabController::class, 'show'])->defaults('tid', 1);
        Route::post('webaru-tabs', [WebaruTabController::class, 'store']);
        Route::post('webaru-tabs/update', [WebaruTabController::class, 'update']);
        Route::delete('webaru-tabs/{id}', [WebaruTabController::class, 'destroy'])->name('webaru-tabs.destroy');
        Route::post('webaru-tabs/upload', [WebaruTabController::class, 'upload']);
        Route::post('webaru-tabs/active', [WebaruTabController::class, 'active']);
    });
    Route::get('webaru-tabs/2', [WebaruTabController::class, 'show'])
        ->defaults('tid', 2)
        ->middleware('permission:webaru.tabs.procurement.manage');
    Route::get('webaru-tabs/3', [WebaruTabController::class, 'show'])
        ->defaults('tid', 3)
        ->middleware('permission:webaru.tabs.hr.manage');
    Route::get('webaru-tabs/4', [WebaruTabController::class, 'show'])
        ->defaults('tid', 4)
        ->middleware('permission:webaru.tabs.calendar_regular.manage');
    Route::get('webaru-tabs/5', [WebaruTabController::class, 'show'])
        ->defaults('tid', 5)
        ->middleware('permission:webaru.tabs.calendar_gsbp.manage');

    // ===============================
    // ศูนย์รับเรื่องร้องเรียน
    // ===============================
    Route::get('webaru-complaints-dashboard',
        [WebaruComplaintController::class, 'dashboard'])
        ->middleware('permission:complaints.dashboard.view');

    Route::get('webaru-complaint-direct-grid',
        [WebaruComplaintDirectController::class, 'index'])
        ->middleware('permission:complaints.direct.manage');
    Route::get('webaru-complaint-direct-grid/{case}', [WebaruComplaintDirectController::class, 'show'])
        ->middleware('permission:complaints.direct.manage')
        ->name('admin.webaru-complaints.direct.show');
    Route::post('webaru-complaint-direct-grid/{case}/store', [WebaruComplaintDirectController::class, 'store'])
        ->middleware('permission:complaints.direct.manage')
        ->name('admin.webaru-complaints.direct.store');
    Route::delete('webaru-complaint-direct-grid/{case}/logs/{log}', [WebaruComplaintDirectController::class, 'deleteLog'])
        ->middleware('permission:complaints.direct.manage')
        ->name('admin.webaru-complaints.direct.logs.delete');

    Route::get('webaru-complaints-grid',
        [WebaruComplaintController::class, 'index'])
        ->middleware('permission:complaints.general.manage');
    Route::get('webaru-complaints/{case}', [WebaruComplaintController::class, 'show'])
        ->middleware('permission:complaints.general.manage')
        ->name('admin.webaru-complaints.show');
    Route::put('webaru-complaints/{case}', [WebaruComplaintController::class, 'update'])
        ->middleware('permission:complaints.general.manage')
        ->name('admin.webaru-complaints.update');
    Route::delete('webaru-complaints/{case}', [WebaruComplaintController::class, 'destroy'])
        ->middleware('permission:complaints.general.manage')
        ->name('admin.webaru-complaints.destroy');
    Route::delete('webaru-complaints/{case}/logs/{log}', [WebaruComplaintController::class, 'deleteLog'])
        ->middleware('permission:complaints.general.manage')
        ->name('admin.webaru-complaints.logs.delete');

    Route::get('webaru-complaint-documents',
        [WebaruComplaintController::class, 'documentIndex'])
        ->middleware('permission:complaints.documents.manage');
    Route::post('webaru-complaint-documents', [WebaruComplaintController::class, 'documentStore'])
        ->middleware('permission:complaints.documents.manage');
    Route::put('webaru-complaint-documents/{document}', [WebaruComplaintController::class, 'documentUpdate'])
        ->middleware('permission:complaints.documents.manage');
    Route::delete('webaru-complaint-documents/{document}', [WebaruComplaintController::class, 'documentDestroy'])
        ->middleware('permission:complaints.documents.manage');

    // ===============================
    // ผู้บริหารมหาวิทยาลัย
    // ===============================
    Route::middleware('permission:webaru.exec_groups.manage')->group(function () {
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
    });
});
