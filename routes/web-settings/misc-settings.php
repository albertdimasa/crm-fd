<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitTypeController;

    Route::post('unit-types/set-default', [UnitTypeController::class, 'setDefaultUnit'])->name('unit-type.set_default');
