<?php

/* Setting menu routes starts from here */
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UpdateAppController;
use Illuminate\Support\Facades\Route;

Route::get('account/settings/google-auth', [GoogleAuthController::class, 'index'])->name('googleAuth');

Route::group(['middleware' => 'auth', 'prefix' => 'account/settings'], function () {
    require __DIR__ . '/web-settings/hr-settings.php';
    require __DIR__ . '/web-settings/crm-settings.php';
    require __DIR__ . '/web-settings/project-settings.php';
    require __DIR__ . '/web-settings/finance-settings.php';
    require __DIR__ . '/web-settings/ticket-settings.php';
    require __DIR__ . '/web-settings/system-settings.php';
    require __DIR__ . '/web-settings/misc-settings.php';
});

Route::group(['middleware' => 'auth', 'prefix' => 'account'], function () {

    Route::resource('company-settings', SettingsController::class)->only(['edit', 'update', 'index', 'change_language']);

    // Update App
    Route::post('update-settings/deleteFile', [UpdateAppController::class, 'deleteFile'])->name('update-settings.deleteFile');
    Route::get('update-settings/install', [UpdateAppController::class, 'install'])->name('update-settings.install');
    Route::resource('update-settings', UpdateAppController::class);

});
