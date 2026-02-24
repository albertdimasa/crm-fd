<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SuperAdmin\FaqController;
use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\InvoiceController;
use App\Http\Controllers\SuperAdmin\PackageController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\FaqCategoryController;
use App\Http\Controllers\SuperAdmin\SupportTicketsController;
use App\Http\Controllers\SuperAdmin\OfflinePlanChangeController;
use App\Http\Controllers\SuperAdmin\SupportTicketTypeController;
use App\Http\Controllers\SuperAdmin\FrontSetting\SignUpController;

Route::group(['middleware' => ['auth'], 'prefix' => 'account', 'as' => 'superadmin.'], function () {
    Route::get('impersonate/stop_impersonate', [SuperAdminController::class, 'stopImpersonate'])->name('superadmin.stop_impersonate');
    Route::get('workspaces', [SuperAdminController::class, 'workspaces'])->name('superadmin.workspaces');
    Route::post('choose-workspace', [SuperAdminController::class, 'chooseWorkspace'])->name('superadmin.choose_workspace');
    Route::get('refresh-cache', [\App\Http\Controllers\AppSettingController::class, 'refreshCache'])->name('superadmin.refresh-cache');
    Route::get('clearCache', [\App\Http\Controllers\AppSettingController::class, 'resetCache'])->name('superadmin.clear-cache');

    Route::post('signup/verifyEmail', [SignUpController::class, 'verifyEmail'])->name('signup.verifyEmail');
    Route::get('notify-admin', [NotificationController::class, 'notifyAdmin'])->name('notify.admin');
    Route::post('notify-admin', [NotificationController::class, 'notifyAdminSubmit'])->name('notify.admin.submit');
});

Route::group(['middleware' => ['auth', 'super-admin'], 'prefix' => 'account', 'as' => 'superadmin.'], function () {
    Route::get('checklists', [DashboardController::class, 'checklist'])->name('checklist');
    Route::get('super-admin-dashboard', [DashboardController::class, 'index'])->name('super_admin_dashboard');
    Route::get('companies/edit-package/{companyId}', [CompanyController::class, 'editPackage'])->name('companies.edit_package');
    Route::put('companies/edit-package/{companyId}', [CompanyController::class, 'updatePackage'])->name('companies.update_package');
    Route::post('companies/login_as_company/{companyId}', [CompanyController::class, 'loginAsCompany'])->name('companies.login_as_company');
    Route::post('companies/approve_company', [CompanyController::class, 'approveCompany'])->name('companies.approve_company');
    Route::resource('faqCategory', FaqCategoryController::class)->except(['index', 'edit', 'show']);
    Route::post('faqs/file-store', [FaqController::class, 'fileStore'])->name('faqs.file-store');
    Route::post('faqs/file-destroy/{id}', [FaqController::class, 'fileDelete'])->name('faqs.file-destroy');

    Route::resource('companies', CompanyController::class);
    Route::resource('superadmin-invoices', InvoiceController::class)->only(['index']);
    Route::resource('packages', PackageController::class)->except(['show']);

    Route::post('superadmin/assignRole', [SuperAdminController::class, 'assignRole'])->name('superadmin.assign_role');
    Route::resource('superadmin', SuperAdminController::class);

    Route::get('offline-plan/change-plan/{id}/{status}', [OfflinePlanChangeController::class, 'confirmChangePlan'])->name('offline-plan.confirmChangePlan');
    Route::post('offline-plan/change-plan', [OfflinePlanChangeController::class, 'changePlan'])->name('offline-plan.changePlan');
    Route::resource('offline-plan', OfflinePlanChangeController::class)->only(['index', 'show']);

    Route::post('support-tickets/apply-quick-action', [SupportTicketsController::class, 'applyQuickAction'])->name('support-tickets.apply_quick_action');
    Route::post('support-tickets/updateOtherData/{id}', [SupportTicketsController::class, 'updateOtherData'])->name('support-tickets.update_other_data');
    Route::get('company-ajax', [CompanyController::class, 'ajaxLoadCompany'])->name('get.company-ajax');

    Route::resource('support-ticketTypes', SupportTicketTypeController::class);

    require __DIR__ . '/web/front-settings.php';

    require __DIR__ . '/web/settings.php';
});

require __DIR__ . '/web/billing.php';

require __DIR__ . '/web/core.php';
