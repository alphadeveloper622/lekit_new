<?php

use App\Http\Controllers\Seller\Addons\PackageController;
use App\Http\Controllers\Admin\Addons\PackageController as AdminPackageController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','isInstalled']
    ], function () {
    Route::middleware(['adminCheck', 'loginCheck', 'XSS'])->prefix('admin')->group(function () {
        Route::get('subscription-setting', [AdminPackageController::class, 'subscriptionSetting'])->name('subscription.setting');
        //Seller Package
        Route::resource('seller_packages',AdminPackageController::class)->except('show','destroy');
        Route::get('offline-purchase-history', [AdminPackageController::class, 'offlinePurchaseHistory'])->name('seller.offline.purchase.history');
        Route::get('online-purchase-history', [AdminPackageController::class, 'onlinePurchaseHistory'])->name('seller.online.purchase.history');
        Route::put('package-status-change', [AdminPackageController::class, 'statusChange'])->name('package.status.change');
        Route::put('subscription-status-change', [AdminPackageController::class, 'subscriptionStatusChange'])->name('subscription.status.change');
        Route::delete('seller-packages/destroy',[AdminPackageController::class,'destroy'])->name('destroy');
        Route::get('subscription-cron',[AdminPackageController::class,'cronSubscription'])->name('cron.subscription');
    });

    Route::middleware(['sellerCheck', 'loginCheck'])->prefix('seller')->group(function () {
        Route::get('subscription', function(){return view('seller.packages.my_subscription');})->name('seller.subscription');
        Route::get('packages', [PackageController::class, 'index'])->name('seller.packages');
        Route::get('offline-purchase-history', [PackageController::class, 'offlinePurchaseHistory'])->name('offline.purchase.history');
        Route::get('online-purchase-history', [PackageController::class, 'onlinePurchaseHistory'])->name('online.purchase.history');
        Route::get('package-purchase/{id}', [PackageController::class, 'payment'])->name('packages.purchase');
        Route::match(['get','post'],'complete-purchase', [PackageController::class, 'completePurchase'])->name('complete.package.purchase')->middleware('signed');
    });

});
