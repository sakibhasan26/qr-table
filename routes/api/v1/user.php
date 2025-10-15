<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\ProfileController;
use App\Http\Controllers\Api\V1\User\AddMoneyController;
use App\Http\Controllers\Api\V1\User\DashboardController;
use App\Http\Controllers\Api\V1\User\TransactionController;

Route::prefix("user")->name("api.user.")->group(function(){

    Route::controller(ProfileController::class)->prefix('profile')->group(function(){
        Route::get('info','profileInfo');
        Route::post('info/update','profileInfoUpdate');
        Route::post('password/update','profilePasswordUpdate');
    });

    // Logout Route
    Route::post('logout',[ProfileController::class,'logout']);

    // // Add Money Routes
    Route::controller(AddMoneyController::class)->prefix("add-money")->name('add.money.')->group(function(){
        Route::get("payment-gateways","getPaymentGateways");

        // Submit with automatic gateway
        Route::post("automatic/submit","automaticSubmit");

        // Automatic Gateway Response Routes
        Route::get('success/response/{gateway}','success')->withoutMiddleware(['auth:api'])->name("payment.success");
        Route::get("cancel/response/{gateway}",'cancel')->withoutMiddleware(['auth:api'])->name("payment.cancel");

        // POST Route For Unauthenticated Request
        Route::post('success/response/{gateway}', 'postSuccess')->name('payment.success')->withoutMiddleware(['auth:api']);
        Route::post('cancel/response/{gateway}', 'postCancel')->name('payment.cancel')->withoutMiddleware(['auth:api']);

        //redirect with Btn Pay
        Route::get('redirect/btn/checkout/{gateway}', 'redirectBtnPay')->name('payment.btn.pay')->withoutMiddleware(['auth:api']);

        Route::get('manual/input-fields','manualInputFields');

        // Submit with manual gateway
        Route::post("manual/submit","manualSubmit");

        // Automatic gateway additional fields
        Route::get('payment-gateway/additional-fields','gatewayAdditionalFields');

        Route::prefix('payment')->name('payment.')->group(function() {
            Route::post('crypto/confirm/{trx_id}','cryptoPaymentConfirm')->name('crypto.confirm');
        });


        // authorize payment submit
        Route::post('authorize-payment-submit','authorizePaymentSubmit');

    });

    // // Dashboard, Notification,
    Route::controller(DashboardController::class)->group(function(){
        Route::get("dashboard","dashboard");
        Route::get("notifications","notifications");
    });

    // // Transaction
    Route::controller(TransactionController::class)->prefix("transaction")->group(function(){
        Route::get("log","log");
    });

});
