<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesReportController;

    Route::resource('sales-report', SalesReportController::class);
