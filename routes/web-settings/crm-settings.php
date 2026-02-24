<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\LeadSettingController;
use App\Http\Controllers\SmtpSettingController;
use App\Http\Controllers\TaskSettingController;
use App\Http\Controllers\TicketAgentController;
use App\Http\Controllers\TicketGroupController;
use App\Http\Controllers\CustomModuleController;
use App\Http\Controllers\SlackSettingController;
use App\Http\Controllers\ThemeSettingController;
use App\Http\Controllers\TwoFASettingController;
use App\Http\Controllers\ModuleSettingController;
use App\Http\Controllers\TicketChannelController;
use App\Http\Controllers\TicketSettingController;
use App\Http\Controllers\InvoiceSettingController;
use App\Http\Controllers\MessageSettingController;
use App\Http\Controllers\ProfileSettingController;
use App\Http\Controllers\ProjectSettingController;
use App\Http\Controllers\PusherSettingsController;
use App\Http\Controllers\StorageSettingController;
use App\Http\Controllers\TimeLogSettingController;
use App\Http\Controllers\BusinessAddressController;
use App\Http\Controllers\CurrencySettingController;
use App\Http\Controllers\LanguageSettingController;
use App\Http\Controllers\SecuritySettingController;
use App\Http\Controllers\LeadAgentSettingController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\ContractSettingController;
use App\Http\Controllers\CustomLinkSettingController;
use App\Http\Controllers\LeadSourceSettingController;
use App\Http\Controllers\SocialAuthSettingController;
use App\Http\Controllers\TicketEmailSettingController;
use App\Http\Controllers\TicketReplyTemplatesController;
use App\Http\Controllers\DatabaseBackupSettingController;
use App\Http\Controllers\GoogleCalendarSettingController;
use App\Http\Controllers\LeadPipelineSettingController;
use App\Http\Controllers\LeadStageSettingController;
use App\Http\Controllers\OfflinePaymentSettingController;
use App\Http\Controllers\PaymentGatewayCredentialController;
use App\Http\Controllers\NotificationSettingController;
use App\Http\Controllers\QuickbookSettingsController;
use App\Http\Controllers\SignUpSettingController;
use App\Http\Controllers\TaxSettingController;
use App\Http\Controllers\UnitTypeController;

    Route::resource('app-settings', AppSettingController::class);
    Route::resource('profile-settings', ProfileSettingController::class);
    Route::resource('two-fa-settings', TwoFASettingController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('smtp-settings', SmtpSettingController::class);
    Route::resource('notifications', NotificationSettingController::class);
    Route::resource('slack-settings', SlackSettingController::class);
    Route::resource('push-notification-settings', PushNotificationController::class);
    Route::resource('pusher-settings', PusherSettingsController::class);
    Route::resource('currency-settings', CurrencySettingController::class);
    Route::resource('payment-gateway-settings', PaymentGatewayCredentialController::class);
    /* End Currency Settings routes */
    Route::resource('offline-payment-setting', OfflinePaymentSettingController::class);
    Route::resource('invoice-settings', InvoiceSettingController::class);
    /* unitType */
    Route::resource('unit-type', UnitTypeController::class);
    /* Start Ticket settings routes */
    Route::post('ticket-agents/update-group/{id}', [TicketAgentController::class, 'updateGroup'])->name('ticket_agents.update_group');
    Route::resource('ticket-agents', TicketAgentController::class);
    Route::get('agent-groups', [TicketAgentController::class, 'agentGroups'])->name('ticket_agents.agent_groups');
    Route::resource('ticket-settings', TicketSettingController::class);
    Route::post('/ticket-agent-settings/{companyId}', [TicketSettingController::class, 'updateTicketSettingForAgent'])->name('ticket-agent-settings.update');
    Route::resource('ticket-groups', TicketGroupController::class);
    Route::resource('ticketTypes', TicketTypeController::class);
    Route::resource('ticketChannels', TicketChannelController::class);
    Route::resource('ticket-email-settings', TicketEmailSettingController::class);
    Route::resource('replyTemplates', TicketReplyTemplatesController::class);
    Route::resource('project-settings', ProjectSettingController::class);
    // Custom Fields Settings
    Route::resource('custom-fields', CustomFieldController::class);
    // Tax Settings
    Route::resource('taxes', TaxSettingController::class);
    // Message settings
    Route::resource('message-settings', MessageSettingController::class);
    Route::resource('storage-settings', StorageSettingController::class);
    Route::resource('language-settings', LanguageSettingController::class);
    // Task Settings
    Route::resource('task-settings', TaskSettingController::class, ['only' => ['index', 'store']]);
    // Time Log Settings
    Route::resource('timelog-settings', TimeLogSettingController::class);
    // Social Auth Settings
    Route::resource('social-auth-settings', SocialAuthSettingController::class, ['only' => ['index', 'update']]);
    /* Lead Settings */
    Route::resource('lead-settings', LeadSettingController::class);
    Route::post('lead-settings-status/update-status/{companyId}', [LeadSettingController::class, 'updateLeadSettingStatus'])->name('lead-setting.update_status');
    Route::resource('lead-source-settings', LeadSourceSettingController::class);
    Route::get('lead-stage-update/{statusId}', [LeadStageSettingController::class, 'statusUpdate'])->name('lead-stage-setting.stageUpdate');
    Route::resource('lead-stage-setting', LeadStageSettingController::class);
    Route::get('lead-pipeline-update/{statusId}', [LeadPipelineSettingController::class, 'statusUpdate'])->name('lead-pipeline-update.stageUpdate');
    Route::resource('lead-pipeline-setting', LeadPipelineSettingController::class);
    Route::resource('lead-agent-settings', LeadAgentSettingController::class);
    Route::post('lead-agent-settings/update-category/{id}', [LeadAgentSettingController::class, 'updateCategory'])->name('lead_agents.update_category');
    Route::post('lead-agent-settings/update-status/{id}', [LeadAgentSettingController::class, 'updateStatus'])->name('lead_agents.update_status');
    Route::get('agent-category', [LeadAgentSettingController::class, 'agentCategories'])->name('lead_agent.categories');
    /* Contract Setting */
    Route::resource('contract-settings', ContractSettingController::class);
    Route::resource('security-settings', SecuritySettingController::class);
    // Google Calendar Settings
    Route::resource('google-calendar-settings', GoogleCalendarSettingController::class);
    Route::resource('database-backup-settings', DatabaseBackupSettingController::class);
    // Theme settings
    Route::resource('theme-settings', ThemeSettingController::class);
    // Module settings
    Route::resource('module-settings', ModuleSettingController::class);
    Route::resource('custom-modules', CustomModuleController::class);
    Route::resource('business-address', BusinessAddressController::class);
    Route::resource('quickbooks-settings', QuickbookSettingsController::class);
    Route::resource('custom-link-settings', CustomLinkSettingController::class);
    Route::resource('sign-up-settings', SignUpSettingController::class)->only(['index', 'update']);
