<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketFileController;
use App\Http\Controllers\TicketReplyController;
use App\Http\Controllers\TicketCustomFormController;

    Route::get('get-contacts', [TicketController::class, 'getContacts'])->name('get.contacts');
    // Tickets
    Route::post('tickets/apply-quick-action', [TicketController::class, 'applyQuickAction'])->name('tickets.apply_quick_action');
    Route::post('tickets/updateOtherData/{id}', [TicketController::class, 'updateOtherData'])->name('tickets.update_other_data');
    Route::post('tickets/change-status', [TicketController::class, 'changeStatus'])->name('tickets.change-status');
    Route::post('tickets/refreshCount', [TicketController::class, 'refreshCount'])->name('tickets.refresh_count');
    Route::get('tickets/agent-group/{id}/{exceptThis?}', [TicketController::class, 'agentGroup'])->name('tickets.agent_group');
    Route::get('tickets/edit-details/{id}', [TicketController::class, 'editDetail'])->name('tickets.edit_detail');
    Route::put('tickets/update-details/{id}', [TicketController::class, 'updateDetail'])->name('tickets.update_detail');
    Route::resource('tickets', TicketController::class);
    // Ticket Custom Embed From
    Route::post('ticket-form/sort-fields', [TicketCustomFormController::class, 'sortFields'])->name('ticket-form.sort_fields');
    Route::resource('ticket-form', TicketCustomFormController::class);
    Route::get('ticket-files/download/{id}', [TicketFileController::class, 'download'])->name('ticket-files.download');
    Route::resource('ticket-files', TicketFileController::class);
    Route::resource('ticket-replies', TicketReplyController::class);
    Route::post('ticket-replies/edit-note/{id}', [TicketReplyController::class, 'editNote'])->name('ticket-replies.edit_note');
