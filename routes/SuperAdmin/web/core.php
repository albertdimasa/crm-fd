<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\FaqController;
use App\Http\Controllers\SuperAdmin\BillingController;
use App\Http\Controllers\SuperAdmin\InvoiceController;
use App\Http\Controllers\SuperAdmin\SupportTicketsController;
use App\Http\Controllers\SuperAdmin\OfflinePlanChangeController;
use App\Http\Controllers\SuperAdmin\SupportTicketFileController;
use App\Http\Controllers\SuperAdmin\SupportTicketReplyController;

Route::group(['middleware' => ['auth', 'admin-or-super-admin'], 'prefix' => 'account', 'as' => 'superadmin.'], function () {
    Route::get('superadmin-invoices/download/{id}', [InvoiceController::class, 'download'])->name('invoices.download');
    Route::get('offline-plan-files/download/{id}', [OfflinePlanChangeController::class, 'download'])->name('offline-plan.download');
    Route::get('billing-offline-plan-file/download/{id}', [BillingController::class, 'offlineFileDownload'])->name('billin-offline-plan.download');
    Route::get('faqs/searchquery/{query?}', [FaqController::class, 'searchQuery'])->name('faqs.searchQuery');
    Route::get('faqs/download/{id}', [FaqController::class, 'download'])->name('faqs.download');
    Route::resource('faqs', FaqController::class);
    Route::resource('support-tickets', SupportTicketsController::class);
    Route::get('support-ticket-files/download/{id}', [SupportTicketFileController::class, 'download'])->name('support-ticket-files.download');
    Route::resource('support-ticket-files', SupportTicketFileController::class);
    Route::resource('support-ticket-replies', SupportTicketReplyController::class);
});
