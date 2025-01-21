<?php

use App\Http\Controllers\Backend\Auth\AuthenticationController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Export\UserExportController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\PickupPointController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\Setting\EmailConfigurationController;
use App\Http\Controllers\Backend\Setting\GeneralSettingController;
use App\Http\Controllers\Backend\Setting\PageController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WarehouseController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\WishlistController;
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
        Route::resource('pickup-point', PickupPointController::class);
        Route::resource('product', ProductController::class);
        Route::resource('slider', SliderController::class);

        Route::get('review/show/{id}', [ReviewController::class, 'index'])->name('review_index');
        Route::delete('review/delete/{id}', [ReviewController::class, 'delete'])->name('review_delete');
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
        Route::get('product/status/{id}', [ProductController::class, 'changeStatus'])->name('product.status');
        Route::get('product/featured/{id}', [ProductController::class, 'featured'])->name('product.featured');
        Route::get('product/today-deal/{id}', [ProductController::class, 'todayDeal'])->name('product.todayDeal');
        Route::get('product/sub-category/{id}', [ProductController::class, 'subCategory'])->name('product.subCategory');
        Route::get('slider/status/{id}', [SliderController::class, 'changeStatus'])->name('slider.status');
    });
});

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'homePage'])->name('homePage');
    Route::get('product/details/{slug}', [HomeController::class, 'productDetail'])->name('productDetail');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [FrontendDashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('update-profile', [FrontendDashboardController::class, 'profile'])->name('update_profile');
    Route::post('review', [ReviewController::class, 'store'])->name('create_review');
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist_list');
    Route::get('wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist_store');
});

require __DIR__ . '/auth.php';
