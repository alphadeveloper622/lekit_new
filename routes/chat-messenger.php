<?php

//otp settings
use App\Http\Controllers\Admin\Addons\ChatMessengerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['XSS','isInstalled'])->group(function () {
    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','isInstalled']
        ], function () {

        Route::middleware(['adminCheck','loginCheck'])->prefix('admin')->group(function () {
            //Chat Messenger
            Route::get('chat-messenger', [ChatMessengerController::class, 'index'])->name('chat.messenger')->middleware('PermissionCheck:chat_messenger_read');
            Route::put('update-chat-messenger', [ChatMessengerController::class, 'update'])->name('chat.messenger.update')->middleware('PermissionCheck:chat_messenger_update');
        });
    });
});
