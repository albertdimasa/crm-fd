<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketSettingController;
use App\Http\Controllers\TicketReplyTemplatesController;

    Route::post('ticket-settings-status/update-status/{companyId}', [TicketSettingController::class, 'updateTicketSettingStatus'])->name('ticket-setting.update_status');
    Route::get('replyTemplates/fetch-template', [TicketReplyTemplatesController::class, 'fetchTemplate'])->name('replyTemplates.fetchTemplate');
