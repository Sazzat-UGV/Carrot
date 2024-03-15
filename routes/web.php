<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->group(function () {

    Route::get('/login', [LoginController::class, 'admin_login_page'])->name('admin.login_page');

    Route::middleware(['auth', 'is_admin'])->group(function () {
        // logout route
        Route::get('/logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
        // dashboard route
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });
});
