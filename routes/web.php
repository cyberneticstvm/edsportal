<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::prefix('')->controller(AuthController::class)->group(function () {
        Route::get('/', 'loginPage')->name('login');
        Route::post('/', 'login')->name('user.login');
    });

    Route::middleware(['web', 'auth', 'auth.session'])->group(function () {
        Route::prefix('home')->controller(AuthController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });

    Route::middleware(['web', 'auth', 'auth.session'])->group(function () {
        Route::prefix('')->controller(AuthController::class)->group(function () {
            Route::get('force/logout', 'forceLogout')->name('force.logout');
            Route::post('force/logout', 'forceLogoutAll')->name('force.logout.all');
            Route::get('logout', 'logout')->name('logout');
        });

        Route::prefix('export')->controller(ExportController::class)->group(function () {
            Route::get('product', 'exportProduct')->name('product.export');
        });

        Route::prefix('portal')->controller(HelperController::class)->group(function () {
            Route::get('account', 'change_password')->name('change.password')->middleware("role:admin");;
            Route::post('account', 'update_password')->name('update.password')->middleware("role:admin");;

            Route::get('certificate', 'certificate_requests')->name('certificate.requests');
            Route::get("certificate-request-status-update", 'certificate_request_status_update')->name("certificate.request.status.update");
            Route::get('certificate-request-delete', 'certificate_request_delete')->name('certificate.request.delete');
            Route::get("print-certificate", "print_certificate")->name("print.certificate")->middleware("role:admin");

            Route::get('feedback', 'feedbacks')->name('feedbacks');
            Route::get('feedback-status-update', 'feedback_status_update')->name('feedback.status.update');
            Route::get('feedback-edit', 'edit_feedback')->name('feedback.edit');
            Route::post('feedback-update', 'update_feedback')->name('feedback.update');

            Route::get('students', 'students')->name('students');
            Route::get('student-edit', 'edit_student')->name('student.edit');
            Route::post('student-update', 'update_student')->name('student.update');
            Route::get('student-delete', 'delete_student')->name('student.delete');

            Route::get('blogs', 'blogs')->name('blogs');
            Route::get('blog-create', 'create_blog')->name('blog.create');
            Route::post('blog-save', 'save_blog')->name('blog.save');
            Route::get('blog-edit', 'edit_blog')->name('blog.edit');
            Route::post('blog-update', 'update_blog')->name('blog.update');
            Route::get('blog-delete', 'delete_blog')->name('blog.delete');

            Route::get('form-submits', 'form_submits')->name('form.submits');
            Route::get('form-submit-delete', 'form_submit_delete')->name('form.submit.delete');

            Route::get('file-uploads', 'file_uploads')->name('file.uploads');
            Route::post('file-uploads', 'file_upload_save')->name('file.upload.save');
            Route::get('file-download', 'file_download')->name('file.download');
            Route::get('file-upload-delete', 'delete_file_upload')->name('file.upload.delete');
        });
    });
});
