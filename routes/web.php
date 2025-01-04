<?php

use App\Http\Controllers\Backend\Auth\AuthenticationController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

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

        // backup download route
        Route::get('/backup/download/{file_name}', [BackUpcontroller::class, 'download'])->name('backupDownload');
    });
});

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
