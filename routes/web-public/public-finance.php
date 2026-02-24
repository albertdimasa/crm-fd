<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Payment\MollieController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Payment\SquareController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\Payment\PayfastController;
use App\Http\Controllers\Payment\PaystackController;
use App\Http\Controllers\Payment\RazorPayController;
use App\Http\Controllers\Payment\AuthorizeController;
use App\Http\Controllers\Payment\FlutterwaveController;
use App\Http\Controllers\Payment\StripeWebhookController;


Route::get('/invoice-stripe/stripe-modal/', [HomeController::class, 'stripeModal'])->name('front.stripe_modal');
Route::get('/invoice-paystack/paystack-modal/', [HomeController::class, 'paystackModal'])->name('front.paystack_modal');
Route::get('/invoice-flutterwave/flutterwave-modal/', [HomeController::class, 'flutterwaveModal'])->name('front.flutterwave_modal');
Route::get('/invoice-mollie/mollie-modal/', [HomeController::class, 'mollieModal'])->name('front.mollie_modal');
Route::get('/invoice-authorize/authorize-modal/', [HomeController::class, 'authorizeModal'])->name('front.authorize_modal');
Route::post('invoice-stripe/save-stripe-detail/', [HomeController::class, 'saveStripeDetail'])->name('front.save_stripe_detail');
Route::get('/invoice/download/{id}', [HomeController::class, 'downloadInvoice'])->name('front.invoice_download');
Route::post('/invoice-payment-failed/{invoiceId}', [HomeController::class, 'invoicePaymentfailed'])->name('front.invoice_payment_failed');

// Payment routes
Route::post('stripe/{invoiceId}', [StripeController::class, 'paymentWithStripe'])->name('stripe');
Route::post('stripe-public/{hash}', [StripeController::class, 'paymentWithStripePublic'])->name('stripe_public');

Route::post('paystack-public/{id}/{hash}', [PaystackController::class, 'paymentWithPaystackPublic'])->name('paystack_public');
Route::get('paystack/callback/{id}/{type}/{hash}', [PaystackController::class, 'handleGatewayCallback'])->name('paystack.callback');
Route::post('paystack-webhook/{hash}', [PaystackController::class, 'handleGatewayWebhook'])->name('paystack.webhook');
Route::get('paystack-webhook/{hash}', [PaystackController::class, 'getWebhook'])->name('get_paystack.webhook');

Route::post('flutterwave-public/{id}', [FlutterwaveController::class, 'paymentWithFlutterwavePublic'])->name('flutterwave_public');
Route::get('flutterwave/callback/{id}/{type}/{hash}', [FlutterwaveController::class, 'handleGatewayCallback'])->name('flutterwave.callback');
Route::post('flutterwave-webhook/{hash}', [FlutterwaveController::class, 'handleGatewayWebhook'])->name('flutterwave.webhook');
Route::get('flutterwave-webhook/{hash}', [FlutterwaveController::class, 'getWebhook'])->name('get_flutterwave.webhook');

Route::post('mollie-public/{id}/{hash}', [MollieController::class, 'paymentWithMolliePublic'])->name('mollie_public');
Route::get('mollie/callback/{id}/{type}/{hash}', [MollieController::class, 'handleGatewayCallback'])->name('mollie.callback');
Route::post('mollie-webhook/{hash}', [MollieController::class, 'handleGatewayWebhook'])->name('mollie.webhook');
Route::get('mollie-webhook/{hash}', [MollieController::class, 'getWebhook'])->name('get_mollie.webhook');

Route::post('payfast-public', [PayfastController::class, 'paymentWithPayfastPublic'])->name('payfast_public');
Route::get('payfast/callback/{id}/{type}/{status}', [PayfastController::class, 'handleGatewayCallback'])->name('payfast.callback');
Route::post('payfast-webhook/{hash}', [PayfastController::class, 'handleGatewayWebhook'])->name('payfast.webhook');
Route::get('payfast-webhook/{hash}', [PayfastController::class, 'getWebhook'])->name('get_payfast.webhook');

Route::post('authorize-public/{id}', [AuthorizeController::class, 'paymentWithAuthorizePublic'])->name('authorize_public');

Route::post('square-public', [SquareController::class, 'paymentWithSquarePublic'])->name('square_public');
Route::get('square/callback/{id}/{type}/{hash}', [SquareController::class, 'handleGatewayCallback'])->name('square.callback');
Route::post('square-webhook/{hash}', [SquareController::class, 'handleGatewayWebhook'])->name('square.webhook');

Route::post('pay-with-razorpay/{hash}', [RazorPayController::class, 'payWithRazorPay'])->name('pay_with_razorpay');
Route::post('razorpay-webhook/{hash}', [RazorPayController::class, 'handleGatewayWebhook'])->name('razorpay.webhook');
Route::get('razorpay-webhook/{hash}', [PaypalController::class, 'getWebhook'])->name('get_razorpay.webhook');

Route::get('paypal-public/{invoiceId}', [PaypalController::class, 'paymentWithpaypalPublic'])->name('paypal_public');
Route::get('paypal/{invoiceId}', [PaypalController::class, 'paymentWithpaypal'])->name('paypal');
Route::get('paypal', [PaypalController::class, 'getPaymentStatus'])->name('get_paypal_status');
Route::get('paypal-recurring', [PaypalController::class, 'payWithPaypalRecurring'])->name('paypal_recurring');

// Paypal IPN
Route::post('paypal-webhook/{hash}', [PaypalController::class, 'webhook'])->name('paypal.webhook');
Route::get('paypal-webhook/{hash}', [PaypalController::class, 'getWebhook'])->name('get_paypal.webhook');

// Stripe webhook
Route::get('/verify-webhook/{hash?}', [StripeWebhookController::class, 'getWebhook'])->name('get_stripe_webhook');
Route::post('/verify-webhook/{hash}', [StripeWebhookController::class, 'verifyStripeWebhook'])->name('stripe.webhook');
Route::get('/invoice/{hash}', [HomeController::class, 'invoice'])->name('front.invoice')->middleware('signed');
