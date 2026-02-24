<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectSettingController;

    /* End Ticket settings routes */
    Route::get('project-settings/create-category', [ProjectSettingController::class, 'createCategory'])->name('project-settings.createCategory');
    Route::post('project-settings/save-project-category', [ProjectSettingController::class, 'saveProjectCategory'])->name('project-settings.saveProjectCategory');
    Route::post('project-settings/{id?}', [ProjectSettingController::class, 'statusUpdate'])->name('project-settings.statusUpdate');
    Route::put('project-settings/change-status/{id?}', [ProjectSettingController::class, 'changeStatus'])->name('project-settings.changeStatus');
    Route::post('project-settings/set-default/{id?}', [ProjectSettingController::class, 'setDefault'])->name('project-settings.setDefault');
