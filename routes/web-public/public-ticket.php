<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/ticket-form/{id}', [HomeController::class, 'ticketForm'])->name('front.ticket_form');
