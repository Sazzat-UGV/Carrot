<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubcategoryController;
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

        // profile route
        Route::get('/profile', [AdminController::class, 'profile_page'])->name('admin.profile_page');
        Route::get('/profile/edit', [AdminController::class, 'edit_profile_page'])->name('admin.edit_profile_page');
        Route::put('/profile/edit/{id}', [AdminController::class, 'edit_profile'])->name('admin.edit_profile');
        Route::post('/profile/image/update', [AdminController::class, 'profile_image_update'])->name('admin.profile_image_update');
        Route::get('/change/password', [AdminController::class, 'change_password_page'])->name('admin.change_password_page');
        Route::put('/change/password/{id}', [AdminController::class, 'change_password'])->name('admin.change_password');

        // resource controller
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubcategoryController::class);
        Route::resource('childcategory', ChildcategoryController::class);

    });
});
