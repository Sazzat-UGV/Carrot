<?php

use App\Http\Controllers\Backend\Auth\AuthenticationController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CampaignController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Export\UserExportController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\NewsletterController;
use App\Http\Controllers\Backend\PickupPointController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\Setting\EmailConfigurationController;
use App\Http\Controllers\Backend\Setting\GeneralSettingController;
use App\Http\Controllers\Backend\Setting\PageController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SupportTicket;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WarehouseController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SocialLoginController;
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
        Route::resource('service', ServiceController::class);
        Route::resource('campaign', CampaignController::class);

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

        // news letter route
        Route::get('news-letter', [NewsletterController::class, 'index'])->name('newsLetter');
        Route::get('news-letter-form', [NewsletterController::class, 'formGet'])->name('newsLetterformGet');
        Route::post('news-letter-form', [NewsletterController::class, 'formPost'])->name('newsLetterformPost');

        // campains route
        Route::get('all-product-list/{campaign_id}', [CampaignController::class, 'allProduct'])->name('all.product');
        Route::get('add-product-campaign/{product_id}/{campaign_id}', [CampaignController::class, 'addProduct'])->name('add.product');
        Route::get('campaign-product-list/{campaign_id}', [CampaignController::class, 'productList'])->name('product.list');
        Route::get('campaign-product-delete/{product_id}/{campaign_id}', [CampaignController::class, 'productDelete'])->name('product.delete');

        // status routes
        Route::get('user/status/{id}', [UserController::class, 'changeStatus'])->name('user.status');
        Route::get('category/status/{id}', [CategoryController::class, 'changeStatus'])->name('category.status');
        Route::get('category/show-home/{id}', [CategoryController::class, 'showHome'])->name('category.showHome');
        Route::get('subcategory/status/{id}', [SubCategoryController::class, 'changeStatus'])->name('subcategory.status');
        Route::get('brand/show-home/{id}', [BrandController::class, 'showHome'])->name('brand.showHome');
        Route::get('coupon/status/{id}', [CouponController::class, 'changeStatus'])->name('coupon.status');
        Route::get('product/status/{id}', [ProductController::class, 'changeStatus'])->name('product.status');
        Route::get('product/featured/{id}', [ProductController::class, 'featured'])->name('product.featured');
        Route::get('product/today-deal/{id}', [ProductController::class, 'todayDeal'])->name('product.todayDeal');
        Route::get('product/trending/{id}', [ProductController::class, 'trending'])->name('product.trending');
        Route::get('product/sub-category/{id}', [ProductController::class, 'subCategory'])->name('product.subCategory');
        Route::get('slider/status/{id}', [SliderController::class, 'changeStatus'])->name('slider.status');
        Route::get('service/status/{id}', [ServiceController::class, 'changeStatus'])->name('service.status');
        Route::get('campaign/status/{id}', [CampaignController::class, 'changeStatus'])->name('campaign.status');

        //support ticket route
        Route::get('support-ticket', [SupportTicket::class, 'allTicket'])->name('all.ticket');
        Route::get('support-ticket-show/{id}', [SupportTicket::class, 'show'])->name('ticket.show');
    });
});

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'homePage'])->name('homePage');
    Route::get('product/details/{slug}', [HomeController::class, 'productDetail'])->name('productDetail');
    Route::get('product/quick_view/{id}', [HomeController::class, 'quickView'])->name('product.quickView');
    Route::get('products/{type}/{slug}', [HomeController::class, 'allProducts'])->name('allProducts');
    Route::get('privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
    Route::get('terms-condition', [HomeController::class, 'TermsCondition'])->name('TermsCondition');
    Route::post('newsletter', [HomeController::class, 'newsLetter'])->name('news_letter');
    Route::get('campaign-product/{campaign_id}', [HomeController::class, 'campaign'])->name('campaign.products');
    Route::get('campaign-product-detail/{campaign_id}/{product_id}', [HomeController::class, 'campaignProductDetail'])->name('campaign.products.details');
    Route::get('contact_us',[HomeController::class,'contactUs'])->name('contact.us');
    Route::post('contact_us',[HomeController::class,'contactUsSubmit'])->name('contact.us');

    // cart routes
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add_to_cart');
    Route::get('my-cart', [CartController::class, 'myCart'])->name('my_cart');
    Route::get('delete-cart', [CartController::class, 'deleteCart'])->name('delete_cart');
    Route::get('remove-single-item/{rowId}', [CartController::class, 'removeSingleItem'])->name('remove_single_item');
    Route::get('update-item-color/{color}/{rowId}', [CartController::class, 'updateItemColor'])->name('update_item_color');
    Route::get('update-item-size/{size}/{rowId}', [CartController::class, 'updateItemSize'])->name('update_item_size');
    Route::get('update-item-qty/{qty}/{rowId}', [CartController::class, 'updateItemQty'])->name('update_item_qty');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [FrontendDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [FrontendDashboardController::class, 'profile'])->name('profile');
    Route::post('update-profile', [FrontendDashboardController::class, 'profileUpdate'])->name('update_profile');
    Route::post('update-profile-image', [FrontendDashboardController::class, 'updateProfileImage'])->name('update_profile_image');
    Route::post('review', [ReviewController::class, 'store'])->name('create_review');
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist_list');
    Route::get('wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist_store');
    Route::get('my-order', [FrontendDashboardController::class, 'myOrderPage'])->name('my_order');

    // checkout routes
    Route::post('apply-coupon', [CheckoutController::class, 'applyCoupon'])->name('apply_coupon');
    Route::get('remove-coupon', [CheckoutController::class, 'removeCoupon'])->name('remove_coupon');
    Route::get('checkout', [CheckoutController::class, 'checkoutPage'])->name('checkout_page');
    Route::post('place-order', [CheckoutController::class, 'placeOrder'])->name('place_order');

    //support ticket
    Route::get('open-ticket', [FrontendDashboardController::class, 'allTicket'])->name('open.ticket');
    Route::get('new-ticket', [FrontendDashboardController::class, 'newTicket'])->name('new.ticket');
    Route::post('new-ticket', [FrontendDashboardController::class, 'newTicketSubmit'])->name('new.ticket');
});

Route::get('google-login', [SocialLoginController::class, 'googleLogin'])->name('google.login');
Route::get('auth/google-callback', [SocialLoginController::class, 'googleLoginCallback'])->name('google.login.callback');
require __DIR__ . '/auth.php';
