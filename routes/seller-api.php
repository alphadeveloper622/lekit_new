<?php

use App\Http\Controllers\Api\Seller\V100\AuthController;
use App\Http\Controllers\Api\Seller\V100\CampaignController;
use App\Http\Controllers\Api\Seller\V100\ChatSystemController;
use App\Http\Controllers\Api\Seller\V100\OrderController;
use App\Http\Controllers\Api\Seller\V100\PackageController;
use App\Http\Controllers\Api\Seller\V100\ProductController;
use App\Http\Controllers\Api\Seller\V100\UserController;
use App\Http\Controllers\Api\Seller\WholesaleController;
use Illuminate\Support\Facades\Route;

Route::prefix('seller')->middleware(['CheckApiKey'])->group(function() {
    Route::prefix('v100')->group(function() {
        Route::post('login', [AuthController::class, 'login']);
        Route::get('config',[AuthController::class,'config']);
        Route::post('register', [AuthController::class,'register']);
        Route::post('user/get-login-otp', [AuthController::class, 'getOtp']);
        Route::post('user/verify-login-otp', [AuthController::class, 'verifyLoginOtp']);
       Route::middleware(['jwt.verify'])->group(function (){
            Route::prefix('user')->group(function (){
                Route::post('logout', [AuthController::class,'logout']);
                Route::get('profile', [UserController::class,'profile']);
                Route::get('home-screen', [UserController::class,'homeScreen']);
                Route::get('data-analysis', [UserController::class,'dataAnalysis']);
                Route::post('update-profile', [UserController::class,'updateProfile']);
                Route::post('shop-details-update', [UserController::class,'shopDetailsUpdate']);
                Route::get('shop-details', [UserController::class,'shopDetails']);
                Route::post('change-password', [UserController::class,'changePassword']);
                Route::get('delete-account', [UserController::class,'destroy']);

                //chat system
                Route::get('users',[ChatSystemController::class,'users']);
                Route::get('messages',[ChatSystemController::class,'messages']);
                Route::post('send-message',[ChatSystemController::class,'sendMessage']);

                //subscription system
                Route::get('active-package',[PackageController::class,'activePackage']);
                Route::get('packages',[PackageController::class,'index']);
                Route::get('offline-purchases',[PackageController::class,'offlinePurchaseHistory']);
                Route::get('online-purchases',[PackageController::class,'onlinePurchaseHistory']);
                Route::get('package-purchase',[PackageController::class,'payment']);
            });
            Route::get('search',[ProductController::class,'search']);
            Route::post('create-product', [ProductController::class, 'store']);
            Route::get('list-product', [ProductController::class, 'index']);
            Route::get('product-details/{id}', [ProductController::class, 'details']);
            Route::get('digital-products', [ProductController::class, 'digitalProducts']);
            Route::get('catalog-products', [ProductController::class, 'catalogProducts']);
            Route::get('classified-products', [ProductController::class, 'classifiedProducts']);
            Route::get('product-create-form-items', [ProductController::class, 'productCreateFormItems']);
            Route::post('seller-delete/products', [ProductController::class, 'delete']);
            Route::get('restore-products/{id}', [ProductController::class, 'restoreProduct']);



            Route::get('wholesale-products', [WholesaleController::class, 'wholesaleProducts']);
            Route::post('wholesale-products-create', [WholesaleController::class, 'store']);
            Route::get('wholesale-products-edit/{id}', [WholesaleController::class, 'edit']);
            Route::post('wholesale-products-update/{id}', [WholesaleController::class, 'update']);



            Route::get('orders-list', [OrderController::class,'orders']);
            Route::get('order-details/{id}', [OrderController::class,'orderDetails']);
            Route::get('invoice-download/{id}', [OrderController::class,'invoiceDownload']);
            Route::get('cancelled-order/{id}', [OrderController::class,'cancelOrder']);
            Route::post('delivered-order', [OrderController::class,'deliveredOrder']);

            Route::get('wallet-list', [UserController::class,'wallets']);

            //campaign
            Route::get('campaign-list', [CampaignController::class,'index']);
            Route::get('campaign-products/{id}', [CampaignController::class,'products']);
            Route::get('remove-campaign-products', [CampaignController::class,'removeProducts']);
            Route::post('request-products', [CampaignController::class,'requestProducts']);
        });

    });
});

