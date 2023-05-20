<?php

//otp settings
use App\Http\Controllers\Seller\Addons\ChatSystemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['XSS','isInstalled'])->group(function () {
    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','isInstalled']
        ], function () {

        Route::middleware(['sellerCheck','loginCheck'])->prefix('seller')->group(function () {
            //Chat Messenger
            Route::get('messages', [ChatSystemController::class, 'index'])->name('messages');
            Route::get('search-user', [ChatSystemController::class, 'searchUser'])->name('search.message.user');
            Route::get('fetch-messages', [ChatSystemController::class, 'fetchMessages'])->name('fetch.messages');
        });

        Route::post('send-message', [ChatSystemController::class, 'sendMsg'])->name('send.message');
        Route::get('home/chat-sellers', [ChatSystemController::class, 'chatSeller'])->name('chat.sellers');
        Route::get('frontend/messages', [ChatSystemController::class, 'frontendMessages'])->name('frontend.messages');
    });
});
