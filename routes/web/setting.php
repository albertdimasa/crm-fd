<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GdprController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuickbookController;
use App\Http\Controllers\GdprSettingsController;
use App\Http\Controllers\UserPermissionController;

    Route::post('image/upload', [ImageController::class, 'store'])->name('image.store');
    Route::get('account-unverified', [DashboardController::class, 'accountUnverified'])->name('account_unverified');
    Route::get('checklist', [DashboardController::class, 'checklist'])->name('checklist');
    Route::get('/pusher/beams-auth', [DashboardController::class, 'beamAuth'])->name('dashboard.beam_auth');
    Route::get('settings/change-language', [SettingsController::class, 'changeLanguage'])->name('settings.change_language');
    Route::resource('settings', SettingsController::class)->only(['edit', 'update', 'index', 'change_language']);
    Route::get('import/process/{name}/{id}', [ImportController::class, 'getImportProgress'])->name('import.process.progress');
    Route::post('user-permissions/customPermissions/{id}', [UserPermissionController::class, 'customPermissions'])->name('user-permissions.custom_permissions');
    Route::post('user-permissions/resetPermissions/{id}', [UserPermissionController::class, 'resetPermissions'])->name('user-permissions.reset_permissions');
    Route::resource('user-permissions', UserPermissionController::class);
    Route::post('gdpr-settings/apply-quick-action', [GdprSettingsController::class, 'applyQuickAction'])->name('gdpr_settings.apply_quick_action');
    Route::put('gdpr-settings.update-general', [GdprSettingsController::class, 'updateGeneral'])->name('gdpr_settings.update_general');
    Route::post('gdpr/store-consent', [GdprSettingsController::class, 'storeConsent'])->name('gdpr.store_consent');
    Route::get('gdpr/add-consent', [GdprSettingsController::class, 'AddConsent'])->name('gdpr.add_consent');
    Route::get('gdpr/edit-consent/{id}', [GdprSettingsController::class, 'editConsent'])->name('gdpr.edit_consent');
    Route::put('gdpr/update-consent/{id}', [GdprSettingsController::class, 'updateConsent'])->name('gdpr.update_consent');
    Route::delete('gdpr-settings/purpose-delete/{id}', [GdprSettingsController::class, 'purposeDelete'])->name('gdpr_settings.purpose_delete');
    Route::resource('gdpr-settings', GdprSettingsController::class);
    Route::get('gdpr/export-data', [GdprController::class, 'downloadJson'])->name('gdpr.export_data');
    Route::post('gdpr/update-consent-block', [GdprController::class, 'updateConsentBlock'])->name('gdpr.update_consent_block');
    Route::resource('gdpr', GdprController::class);
    // Remove in v 5.2.5
    Route::get('hide-webhook-url', [SettingsController::class, 'hideWebhookAlert'])->name('hideWebhookAlert');
    Route::get('quickbooks/{hash}/callback', [QuickbookController::class, 'callback'])->name('quickbooks.callback');
    Route::get('quickbooks', [QuickbookController::class, 'index'])->name('quickbooks.index');
