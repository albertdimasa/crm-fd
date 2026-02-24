<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\SmtpSettingController;
use App\Http\Controllers\CustomModuleController;
use App\Http\Controllers\SlackSettingController;
use App\Http\Controllers\TwoFASettingController;
use App\Http\Controllers\StorageSettingController;
use App\Http\Controllers\BusinessAddressController;
use App\Http\Controllers\LanguageSettingController;
use App\Http\Controllers\SecuritySettingController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\DatabaseBackupSettingController;

    Route::post('app-settings/deleteSessions', [AppSettingController::class, 'deleteSessions'])->name('app-settings.delete_sessions');
    /* 2FA */
    Route::get('2fa-codes-download', [TwoFASettingController::class, 'download'])->name('2fa_codes_download');
    Route::get('verify-2fa-password', [TwoFASettingController::class, 'verify'])->name('verify_2fa_password');
    Route::get('2fa-confirm', [TwoFASettingController::class, 'showConfirm'])->name('two-fa-settings.validate_confirm');
    Route::post('2fa-confirm', [TwoFASettingController::class, 'confirm'])->name('two-fa-settings.confirm');
    Route::get('2fa-email-confirm', [TwoFASettingController::class, 'showEmailConfirm'])->name('two-fa-settings.validate_email_confirm');
    Route::post('2fa-email-confirm', [TwoFASettingController::class, 'emailConfirm'])->name('two-fa-settings.email_confirm');
    Route::post('profile/dark-theme', [ProfileController::class, 'darkTheme'])->name('profile.dark_theme');
    Route::post('profile/updateOneSignalId', [ProfileController::class, 'updateOneSignalId'])->name('profile.update_onesignal_id');
    Route::get('smtp-settings/show-send-test-mail-modal', [SmtpSettingController::class, 'showTestEmailModal'])->name('smtp_settings.show_send_test_mail_modal');
    Route::get('smtp-settings/send-test-mail', [SmtpSettingController::class, 'sendTestEmail'])->name('smtp_settings.send_test_mail');
    Route::get('slack-settings/send-test-notification', [SlackSettingController::class, 'sendTestNotification'])->name('slack_settings.send_test_notification');
    Route::get('push-notification-settings/send-test-notification', [PushNotificationController::class, 'sendTestNotification'])->name('push_notification_settings.send_test_notification');
    // Storage settings
    Route::get('storage-settings/aws-local-to-aws-modal', [StorageSettingController::class, 'awsLocalToAwsModal'])->name('storage-settings.aws_local_to_aws_modal');
    Route::post('storage-settings/aws-local-to-aws', [StorageSettingController::class, 'moveFilesLocalToAwsS3'])->name('storage-settings.aws_local_to_aws');
    Route::get('storage-settings/storage-test-modal/{type}', [StorageSettingController::class, 'awsTestModal'])->name('storage-settings.aws_test_modal');
    Route::post('storage-settings/aws-test', [StorageSettingController::class, 'awsTest'])->name('storage-settings.aws_test');
    // Language settings
    Route::get('language-settings/auto-translate', [LanguageSettingController::class, 'autoTranslate'])->name('language_settings.auto_translate');
    Route::post('language-settings/auto-translate', [LanguageSettingController::class, 'autoTranslateUpdate'])->name('language_settings.auto_translate_update');
    Route::post('language-settings/update-data/{id?}', [LanguageSettingController::class, 'updateData'])->name('language_settings.update_data');
    Route::post('language-settings/fix-translation', [LanguageSettingController::class, 'fixTranslation'])->name('language_settings.fix_translation');
    Route::post('language-settings/create-en-locale', [LanguageSettingController::class, 'createEnLocale'])->name('language_settings.create_en_locale');
    // Security Settings
    Route::get('verify-google-recaptcha-v3', [SecuritySettingController::class, 'verify'])->name('verify_google_recaptcha_v3');
    Route::delete('google-auth', [GoogleAuthController::class, 'destroy'])->name('googleAuth.destroy');
    // Database Backup Settings
    Route::get('database-backup-settings/create-backup', [DatabaseBackupSettingController::class, 'createBackup'])->name('database-backup-settings.create_backup');
    Route::get('database-backup-settings/download/{file_name}', [DatabaseBackupSettingController::class, 'download'])->name('database-backup-settings.download');
    Route::get('database-backup-settings/delete/{file_name}', [DatabaseBackupSettingController::class, 'delete'])->name('database-backup-settings.delete');
    // Custom Modules
    Route::post('custom-modules/verify-purchase', [CustomModuleController::class, 'verifyingModulePurchase'])->name('custom-modules.verify_purchase');
    Route::post('business-address/set-default', [BusinessAddressController::class, 'setDefaultAddress'])->name('business-address.set_default');
