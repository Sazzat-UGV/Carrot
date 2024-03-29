<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PickupPointController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\HomeController;
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
Route::prefix('/')->group(function(){

    Route::get(' ',[IndexController::class,'mainPage'])->name('mainPage');

});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();





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
        Route::resource('brand', BrandController::class);
        Route::resource('warehouse', WarehouseController::class);
        Route::resource('coupon', CouponController::class);
        Route::resource('pickup_point', PickupPointController::class);
        Route::resource('product', ProductController::class);

        //ajax routes
        Route::get('change/status/brand/{id}', [BrandController::class, 'changeStatus'])->name('admin.changeBrandStatus');
        Route::get('change/status/coupon/{id}', [CouponController::class, 'changeStatus'])->name('admin.changeCouponStatus');
        Route::get('get-child-category/{id}', [ProductController::class, 'getChildCategory'])->name('ajax.getChildCategory');
        Route::get('featured/update/{id}', [ProductController::class, 'featuredUpdate'])->name('ajax.featuredUpdate');
        Route::get('today_deal/update/{id}', [ProductController::class, 'todayDealUpdate'])->name('ajax.todayDealUpdate');
        Route::get('status/update/{id}', [ProductController::class, 'statusUpdate'])->name('ajax.statusUpdate');

        //setting route
        Route::prefix('/setting')->group(function () {
            // seo setting
            Route::prefix('seo')->group(function () {
                Route::get('/', [SettingController::class, 'seo'])->name('seo.setting');
                Route::put('/update/{id}', [SettingController::class, 'seoUpdate'])->name('seo.settingUpdate');
            });
            // smtp setting
            Route::prefix('smtp')->group(function () {
                Route::get('/', [SettingController::class, 'smtp'])->name('smtp.setting');
                Route::put('/update/{id}', [SettingController::class, 'smtpUpdate'])->name('smtp.settingUpdate');
            });
            // page setting
            Route::prefix('page')->group(function () {
                Route::get('/', [PageController::class, 'index'])->name('page.index');
                Route::get('/create', [PageController::class, 'create'])->name('page.create');
                Route::post('/store', [PageController::class, 'store'])->name('page.store');
                Route::delete('/delete/{id}', [PageController::class, 'delete'])->name('page.delete');
                Route::get('/update/{id}', [PageController::class, 'edit'])->name('page.edit');
                Route::put('/update/{id}', [PageController::class, 'update'])->name('page.update');
            });
            // smtp setting
            Route::prefix('website')->group(function () {
                Route::get('/', [SettingController::class, 'website'])->name('website.setting');
                Route::put('/update/{id}', [SettingController::class, 'websiteUpdate'])->name('website.settingUpdate');
            });
        });
    });
});
