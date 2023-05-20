<?php

//otp settings
use App\Http\Controllers\Admin\Addons\AffiliateController;
use App\Http\Controllers\Admin\Addons\RewardSystemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['XSS','isInstalled'])->group(function () {
    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','isInstalled']
        ], function () {

        Route::middleware(['adminCheck', 'loginCheck'])->group(function () {
            Route::group(['prefix' => 'admin'], function () {
                Route::get('/affiliate-configuration', [AffiliateController::class, 'index'])->name('affiliate.configuration');
                Route::get('/affiliate-program', [AffiliateController::class, 'affiliateProgram'])->name('affiliate.program');
                Route::put('/affiliate-program-update', [AffiliateController::class, 'affiliateProgramUpdate'])->name('affiliate.program.update');
                Route::post('configure-affiliate-by',[AffiliateController::class,'configureAffiliateBy'])->name('configure.affiliate.by');
                Route::put('category-affiliate-status-change',[AffiliateController::class,'statusChange'])->name('category.affiliate.status.change');
                Route::put('seller-affiliate-status-change',[AffiliateController::class,'statusChange'])->name('seller.affiliate.status.change');
                Route::put('product-affiliate-status-change',[AffiliateController::class,'statusChange'])->name('product.affiliate.status.change');
            });
            Route::group(['prefix' => 'user'], function () {
            });
        });
    });
});
