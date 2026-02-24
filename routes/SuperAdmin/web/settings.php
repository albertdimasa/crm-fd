<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomModuleController;
use App\Http\Controllers\SuperAdmin\CustomFieldController;
use App\Http\Controllers\SuperAdmin\ThemeSettingController;
use App\Http\Controllers\SuperAdmin\InvoiceSettingController;
use App\Http\Controllers\SuperAdmin\ProfileSettingController;
use App\Http\Controllers\SuperAdmin\GlobalCurrencySettingController;
use App\Http\Controllers\SuperAdmin\OfflinePaymentSettingController;
use App\Http\Controllers\SuperAdmin\PaymentGatewayCredentialController;
use App\Http\Controllers\SuperAdmin\SuperadminRolePermissionController;

Route::group(['middleware' => 'auth', 'prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::resource('super-admin-profile', ProfileSettingController::class);
        Route::resource('super-admin-theme-settings', ThemeSettingController::class);
        Route::resource('custom-module-settings', CustomModuleController::class);
        Route::resource('global-custom-fields', CustomFieldController::class);
        // Currency Settings routes
        Route::get('global-currency-settings/update/exchange-rates', [GlobalCurrencySettingController::class, 'updateExchangeRate'])->name('currency_settings.update_exchange_rates');

        /* Start Currency Settings routes */
        Route::get('global-currency-settings/exchange-key', [GlobalCurrencySettingController::class, 'currencyExchangeKey'])->name('currency_settings.exchange_key');
        Route::post('global-currency-settings/exchange-key-store', [GlobalCurrencySettingController::class, 'currencyExchangeKeyStore'])->name('currency_settings.exchange_key_store');
        Route::get('global-currency-settings/exchange-rate/{currency}', [GlobalCurrencySettingController::class, 'exchangeRate'])->name('currency_settings.exchange_rate');

        Route::get('global-currency-settings/update-currency-format', [GlobalCurrencySettingController::class, 'updateCurrencyFormat'])->name('currency_settings.update_currency_format');
        Route::resource('global-currency-settings', GlobalCurrencySettingController::class);
        Route::resource('global-payment-gateway-settings', PaymentGatewayCredentialController::class);
        Route::resource('global-offline-payment-setting', OfflinePaymentSettingController::class);
        Route::resource('global-invoice-settings', InvoiceSettingController::class);

        // SuperAdmin Role Permissions
        Route::post('superadmin-permissions/storeRole', [SuperadminRolePermissionController::class, 'storeRole'])->name('superadmin-permissions.store_role');
        Route::post('superadmin-permissions/deleteRole', [SuperadminRolePermissionController::class, 'deleteRole'])->name('superadmin-permissions.delete_role');
        Route::post('superadmin-permissions/permissions', [SuperadminRolePermissionController::class, 'permissions'])->name('superadmin-permissions.permissions');
        Route::post('superadmin-permissions/customPermissions', [SuperadminRolePermissionController::class, 'customPermissions'])->name('superadmin-permissions.custom_permissions');
        Route::post('superadmin-permissions/reset-permissions', [SuperadminRolePermissionController::class, 'resetPermissions'])->name('superadmin-permissions.reset_permissions');
        Route::resource('superadmin-permissions', SuperadminRolePermissionController::class);
});
