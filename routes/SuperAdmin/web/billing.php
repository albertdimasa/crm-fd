<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\MollieController;
use App\Http\Controllers\SuperAdmin\BillingController;
use App\Http\Controllers\SuperAdmin\PayFastController;
use App\Http\Controllers\SuperAdmin\PaystackController;
use App\Http\Controllers\SuperAdmin\AuthorizeController;
use App\Http\Controllers\SuperAdmin\PaypalIPNController;
use App\Http\Controllers\SuperAdmin\StripeWebhookController;
use App\Http\Controllers\SuperAdmin\PayFastWebhookController;
use App\Http\Controllers\SuperAdmin\PaystackWebhookController;
use App\Http\Controllers\SuperAdmin\RazorpayWebhookController;
use App\Http\Controllers\SuperAdmin\AuthorizeWebhookController;
use App\Http\Controllers\SuperAdmin\SuperAdminPaypalController;

Route::group(['middleware' => ['auth', 'multi-company-select'], 'prefix' => 'account/settings'], function () {
    Route::get('billing/upgrade-plan', [BillingController::class, 'upgradePlan'])->name('billing.upgrade_plan');

    Route::post('billing/unsubscribe', [BillingController::class, 'cancelSubscription'])->name('billing.unsubscribe');
    Route::post('billing/razorpay-payment', [BillingController::class, 'razorpayPayment'])->name('billing.razorpay-payment');
    Route::post('billing/razorpay-subscription', [BillingController::class, 'razorpaySubscription'])->name('billing.razorpay-subscription');
    Route::get('billing/select-package/{packageID}', [BillingController::class, 'selectPackage'])->name('billing.select-package');
    Route::get('billing/package', [BillingController::class, 'packages'])->name('billing.packages');


    // Paypal IPN
    #Route::post('paypal-webhook/{hash}', [BillingController::class, 'webhook'])->name('paypal.webhook');
    #Route::get('paypal-webhook/{hash}', [BillingController::class, 'getWebhook'])->name('get_paypal.webhook');

    Route::post('billing/stripe-validate', [BillingController::class, 'stripeValidate'])->name('billing.stripe-validate');
    Route::post('billing/payment-stripe', [BillingController::class, 'payment'])->name('billing.stripe');
    Route::post('billing/payment-authorize', [AuthorizeController::class, 'createSubscription'])->name('billing.authorize');
    Route::post('billing/check-authorize-subscription', [AuthorizeController::class, 'checkSubscription'])->name('billing.check-authorize-subscription');
    Route::get('billing/invoice-download/{invoice}', [BillingController::class, 'download'])->name('billing.invoice-download');

    Route::get('billing/payfast-success', [PayFastController::class, 'payFastPaymentSuccess'])->name('billing.payfast-success');
    Route::get('billing/payfast-cancel', [PayFastController::class, 'payFastPaymentCancel'])->name('billing.payfast-cancel');

    Route::post('billing/payfast-pay', [PaystackController::class, 'redirectToGateway'])->name('billing.paystack');
    #Route::get('payfast/callback/{id}/{type}/{status}', [PayfastController::class, 'handleGatewayCallback'])->name('payfast.callback');
   # Route::post('payfast-webhook/{hash}', [PayfastController::class, 'handleGatewayWebhook'])->name('payfast.webhook');

    Route::post('billing/mollie', [MollieController::class, 'redirectToGateway'])->name('billing.mollie');

    Route::post('billing/free-plan', [BillingController::class, 'freePlan'])->name('billing.free-plan');

    Route::get('billing/paypal/{packageId}/{type}', [SuperAdminPaypalController::class, 'paymentWithpaypal'])->name('billing.paypal-payment');
    Route::get('billing/paypal-recurring', [SuperAdminPaypalController::class, 'payWithPaypalRecurrring'])->name('billing.paypal-recurring');
    Route::get('billing/paypal-invoice', [SuperAdminPaypalController::class, 'createInvoice'])->name('billing.paypal-invoice');
    Route::get('billing/paywithpaypal', [SuperAdminPaypalController::class, 'payWithPaypal'])->name('billing.paywithpaypal');
    Route::get('billing/cancel-agreement', [SuperAdminPaypalController::class, 'cancelAgreement'])->name('billing.cancel-agreement');


    Route::post('billing/lifetime', [BillingController::class, 'saveLifetimePackage'])->name('billing.lifetime');
    Route::post('billing/stripeNew/{companyId}', [BillingController::class, 'lifetimepaymentWithStripe'])->name('billing.stripeNew');

    // Route::get('paypal-public/{companyId}', [BillingController::class, 'paymentWithpaypalPublic'])->name('paypal_public');
    // Route::get('paypal/{companyId}', [BillingController::class, 'paymentWithpaypal'])->name('paypal');
    // Route::get('paypal', [BillingController::class, 'getPaymentStatus'])->name('get_paypal_status');
    // Route::get('paypal-recurring', [BillingController::class, 'payWithPaypalRecurring'])->name('paypal_recurring');



    // route for check status responce
    Route::get('billing/offline-payment', [BillingController::class, 'offlinePayment'])->name('billing.offline-payment');
    Route::post('billing/offline-payment-submit', [BillingController::class, 'offlinePaymentSubmit'])->name('billing.offline-payment-submit');


    Route::get('paypal', [SuperAdminPaypalController::class, 'getPaymentStatus'])->name('billing.paypal');


    Route::get('billing', [BillingController::class, 'index'])->name('billing.index');
});
Route::post('save-invoices', [StripeWebhookController::class, 'saveInvoices'])->name('billing.save_webhook');
Route::post('billing-verify-webhook/{id}', [StripeWebhookController::class, 'verifyStripeWebhook'])->name('billing.verify-webhook');
Route::post('save-razorpay-webhook/{id}', [RazorpayWebhookController::class, 'saveInvoices'])->name('billing.save_razorpay-webhook');
Route::post('save-paystack-webhook/{id}', [PaystackWebhookController::class, 'saveInvoices'])->name('billing.save_paystack-webhook');
Route::post('save-paypal-webhook/{id}', [PaypalIPNController::class, 'verpayment-authorizeifyBillingIPN'])->name('billing.save_paypal-webhook');
Route::post('save-authorize-webhook/{id}', [AuthorizeWebhookController::class, 'saveInvoices'])->name('billing.save_authorize-webhook');
Route::get('save-mollie-callback/{paymentId}/{hash}', [MollieController::class, 'handleGatewayCallback'])->name('billing.mollie.callback');
Route::post('save-mollie-webhook/{subscriptionId}/{hash}', [MollieController::class, 'handleGatewayWebhook'])->name('billing.mollie.webhook');
Route::post('payfast-notification/{id}', [PayFastWebhookController::class, 'saveInvoice'])->name('payfast-notification');
Route::get('billing/paystack/callback', [PaystackController::class, 'handleGatewayCallback'])->name('billing.paystack.callback');
