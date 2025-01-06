<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmailConfigurationController;
use App\Http\Controllers\Backend\Auth\AuthenticationController;
use App\Http\Controllers\Backend\Setting\GeneralSettingController;

Route::redirect('admin', 'admin/login');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('login', [AuthenticationController::class, 'loginPage'])->name('login.page')->middleware('auth.redirect');
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');

    Route::middleware(['auth', 'admin'])->group(function () {
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

        // general setting route
        Route::get('general-setting', [GeneralSettingController::class, 'index'])->name('general_setting_page');
        Route::post('general-setting', [GeneralSettingController::class, 'setting_submit'])->name('general_setting_submit');

        // email configuration setting route
        Route::get('email-configuration', [EmailConfigurationController::class, 'index'])->name('email_configuration_page');
        Route::post('email-configuration', [EmailConfigurationController::class, 'setting_submit'])->name('email_configuration_submit');

        //  terms condition route
        Route::get('terms-condition', [PageController::class, 'termsConditionPage'])->name('termsConditionPage');
        Route::post('terms-condition', [PageController::class, 'termsCondition'])->name('termsCondition');

        // privacy policy route
        Route::get('privacy-policy', [PageController::class, 'privacyPolicyPage'])->name('privacyPolicyPage');
        Route::post('privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacyPolicy');
        // backup download route
        Route::get('/backup/download/{file_name}', [BackUpcontroller::class, 'download'])->name('backupDownload');
    });
});

Route::get('index',function(){
    $user=User::paginate(1);
    return view('backend.pages.index',compact('user'));
})->name('demo');
// user routes
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
