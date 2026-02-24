<?php

use App\Http\Controllers\SuperAdmin\PaypalIPNController;
use Illuminate\Support\Facades\Route;

Route::post('verify-billing-ipn', [PaypalIPNController::class, 'verifyBillingIPN'])->name('verify-billing-ipn');

require __DIR__ . '/web-public/frontend.php';

require __DIR__ . '/web-public/signup.php';
