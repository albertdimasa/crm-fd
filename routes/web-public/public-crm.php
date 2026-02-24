<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicUrlController;
use App\Http\Controllers\PublicLeadGdprController;


Route::get('/lead-form/{id}', [HomeController::class, 'leadForm'])->name('front.lead_form');
Route::post('/lead-form/leadStore', [HomeController::class, 'leadStore'])->name('front.lead_store');
Route::post('/lead-form/ticket-store', [HomeController::class, 'ticketStore'])->name('front.ticket_store');

Route::post('/contract/sign/{id}', [PublicUrlController::class, 'contractSign'])->name('front.contract.sign');
Route::get('/contract/download/{id}', [PublicUrlController::class, 'contractDownload'])->name('front.contract.download');
// Estimate Public url

Route::post('/estimate/decline/{id}', [PublicUrlController::class, 'estimateDecline'])->name('front.estimate.decline');
Route::post('/estimate/accept/{id}', [PublicUrlController::class, 'estimateAccept'])->name('front.estimate.accept');
Route::get('/estimate/download/{id}', [PublicUrlController::class, 'estimateDownload'])->name('front.estimate.download');



Route::post('/proposal-action/{id}', [HomeController::class, 'proposalActionStore'])->name('front.proposal_action');
Route::get('/proposal/download/{id}', [HomeController::class, 'downloadProposal'])->name('front.download_proposal');



Route::get('/consent/l/{hash}', [PublicLeadGdprController::class, 'consent'])->name('front.gdpr.consent');
Route::post('/consent/remove-lead-request', [PublicLeadGdprController::class, 'learemoveLeadRequestd'])->name('front.gdpr.remove_lead_request');
Route::post('/consent/l/update/{lead}', [PublicLeadGdprController::class, 'updateConsent'])->name('front.gdpr.consent.update');

// SIGNED URLS ->middleware('signed')
Route::get('/proposal/{hash}', [HomeController::class, 'proposal'])->name('front.proposal')->middleware('signed');
Route::get('/contract/{hash}', [PublicUrlController::class, 'contractView'])->name('front.contract.show')->middleware('signed');
Route::get('/estimate/{hash}', [PublicUrlController::class, 'estimateView'])->name('front.estimate.show')->middleware('signed');
