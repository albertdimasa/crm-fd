<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\CompanyRegisterController;
use App\Http\Controllers\SuperAdmin\FrontendController;

Route::group(['as' => 'front.', 'middleware' => ['disable-frontend', 'web']], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::post('contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');
    Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
    Route::resource('signup', CompanyRegisterController::class, ['only' => ['index', 'store']]);
    Route::get('features', [FrontendController::class, 'feature'])->name('feature');
    Route::get('pricing', [FrontendController::class, 'pricing'])->name('pricing');
    Route::get('pricing-plan', [FrontendController::class, 'pricingPlan'])->name('pricing_plan');
    Route::get('language/{lang}', [FrontendController::class, 'changeLanguage'])->name('language.lang');
    Route::get('page/{slug?}', [FrontendController::class, 'page'])->name('page');
});
