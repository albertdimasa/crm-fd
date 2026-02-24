<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\FrontendController;

Route::group(['as' => 'front.', 'middleware' => ['web']], function () {
    Route::get('client-signup/{company:hash}', [FrontendController::class, 'clientSignup'])->name('client-signup');
    Route::middleware('guest')->group(function () {
        Route::post('client-signup/{company:hash}', [FrontendController::class, 'clientRegister'])->name('client-register');
    });
});
