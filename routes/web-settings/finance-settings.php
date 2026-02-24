<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceSettingController;
use App\Http\Controllers\CurrencySettingController;

    // Currency Settings routes
    Route::get('currency-settings/update/exchange-rates', [CurrencySettingController::class, 'updateExchangeRate'])->name('currency_settings.update_exchange_rates');
    /* Start Currency Settings routes */
    Route::get('currency-settings/exchange-key', [CurrencySettingController::class, 'currencyExchangeKey'])->name('currency_settings.exchange_key');
    Route::post('currency-settings/exchange-key-store', [CurrencySettingController::class, 'currencyExchangeKeyStore'])->name('currency_settings.exchange_key_store');
    Route::get('currency-settings/exchange-rate/{currency}', [CurrencySettingController::class, 'exchangeRate'])->name('currency_settings.exchange_rate');
    Route::get('currency-settings/update-currency-format', [CurrencySettingController::class, 'updateCurrencyFormat'])->name('currency_settings.update_currency_format');
    /* Invoice Setting Routes */
    Route::post('invoice-settings/update-template/{id}', [InvoiceSettingController::class, 'updateTemplate'])->name('invoice_settings.update_template');
    Route::post('invoice-settings/update-prefix/{id}', [InvoiceSettingController::class, 'updatePrefix'])->name('invoice_settings.update_prefix');
