<?php

use App\Http\Controllers\Backend\Auth\AuthenticationController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Export\UserExportController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setting\EmailConfigurationController;
use App\Http\Controllers\Backend\Setting\GeneralSettingController;
use App\Http\Controllers\Backend\Setting\PageController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::redirect('admin', 'admin/login');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('login', [AuthenticationController::class, 'loginPage'])->name('login.page')->middleware('auth.redirect');
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');

    Route::middleware(['auth', 'user'])->group(function () {
        Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        //profile routes
        Route::get('profile', [ProfileController::class, 'profilePage'])->name('profile.page');
        Route::post('profile', [ProfileController::class, 'profile'])->name('profile');
        Route::get('change-password', [ProfileController::class, 'changePasswordPage'])->name('changePassword.page');
        Route::post('change-password', [ProfileController::class, 'changePassword'])->name('changePassword');

        //resource controller
        Route::resource('backup', BackupController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('warehouse', WarehouseController::class);
        Route::resource('coupon', CouponController::class);

        //user controller
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/details/{id}', [UserController::class, 'show'])->name('user.show');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        // general setting route
        Route::get('general-setting', [GeneralSettingController::class, 'index'])->name('general_setting_page');
        Route::post('general-setting', [GeneralSettingController::class, 'setting_submit'])->name('general_setting_submit');

        // email configuration setting route
        Route::get('email-configuration', [EmailConfigurationController::class, 'index'])->name('email_configuration_page');
        Route::post('email-configuration', [EmailConfigurationController::class, 'setting_submit'])->name('email_configuration_submit');

        //  terms condition route
        Route::get('terms-condition', [PageController::class, 'termsConditionPage'])->name('termsConditionPage');
        Route::post('terms-condition', [PageController::class, 'termsCondition'])->name('termsCondition');

        // export route
        Route::get('user_export/excel', [UserExportController::class, 'exportExcel'])->name('exportExcel');
        Route::get('user_export/pdf', [UserExportController::class, 'exportPDF'])->name('exportPDF');

        // privacy policy route
        Route::get('privacy-policy', [PageController::class, 'privacyPolicyPage'])->name('privacyPolicyPage');
        Route::post('privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacyPolicy');

        // backup download route
        Route::get('/backup/download/{file_name}', [BackUpcontroller::class, 'download'])->name('backupDownload');

        // status routes
        Route::get('user/status/{id}', [UserController::class, 'changeStatus'])->name('user.status');
        Route::get('category/status/{id}', [CategoryController::class, 'changeStatus'])->name('category.status');
        Route::get('subcategory/status/{id}', [SubCategoryController::class, 'changeStatus'])->name('subcategory.status');
        Route::get('coupon/status/{id}', [CouponController::class, 'changeStatus'])->name('coupon.status');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
