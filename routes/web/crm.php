<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GdprController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\LeadFileController;
use App\Http\Controllers\LeadNoteController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ClientDocController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadBoardController;
use App\Http\Controllers\ClientNoteController;
use App\Http\Controllers\LeadReportController;
use App\Http\Controllers\LeadCategoryController;
use App\Http\Controllers\ContractFileController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\GdprSettingsController;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\ContractRenewController;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\ClientCategoryController;
use App\Http\Controllers\LeadCustomFormController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ContractTemplateController;
use App\Http\Controllers\EstimateTemplateController;
use App\Http\Controllers\ProposalTemplateController;
use App\Http\Controllers\ClientSubCategoryController;
use App\Http\Controllers\ContractDiscussionController;
use App\Http\Controllers\DealNoteController;
use App\Http\Controllers\DiscussionCategoryController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\KnowledgeBaseCategoryController;
use App\Http\Controllers\EstimateRequestController;
use App\Http\Controllers\LeadContactController;
use App\Http\Controllers\ProjectSubCategoryController;

    Route::get('dashboard/lead-data/{id}', [DashboardController::class, 'getLeadStage'])->name('dashboard.deal-stage-data');
    Route::post('approve/{id}', [ClientController::class, 'approve'])->name('clients.approve');
    Route::post('save-consent-purpose-data/{client}', [ClientController::class, 'saveConsentLeadData'])->name('clients.save_consent_purpose_data');
    Route::get('clients/gdpr-consent', [ClientController::class, 'consent'])->name('clients.gdpr_consent');
    Route::post('clients/save-client-consent/{lead}', [ClientController::class, 'saveClientConsent'])->name('clients.save_client_consent');
    Route::post('clients/ajax-details/{id}', [ClientController::class, 'ajaxDetails'])->name('clients.ajax_details');
    Route::get('clients/client-details/{id}', [ClientController::class, 'clientDetails'])->name('clients.client_details');
    Route::post('clients/project-list/{id}', [ClientController::class, 'projectList'])->name('clients.project_list');
    Route::post('clients/apply-quick-action', [ClientController::class, 'applyQuickAction'])->name('clients.apply_quick_action');
    Route::get('clients/import', [ClientController::class, 'importClient'])->name('clients.import');
    Route::post('clients/import', [ClientController::class, 'importStore'])->name('clients.import.store');
    Route::post('clients/import/process', [ClientController::class, 'importProcess'])->name('clients.import.process');
    Route::get('clients/finance-count/{id}', [ClientController::class, 'financeCount'])->name('clients.finance_count');
    Route::resource('clients', ClientController::class);
    Route::post('client-contacts/apply-quick-action', [ClientContactController::class, 'applyQuickAction'])->name('client-contacts.apply_quick_action');
    Route::resource('client-contacts', ClientContactController::class);
    Route::get('client-notes/ask-for-password/{id}', [ClientNoteController::class, 'askForPassword'])->name('client_notes.ask_for_password');
    Route::post('client-notes/check-password', [ClientNoteController::class, 'checkPassword'])->name('client_notes.check_password');
    Route::post('client-notes/apply-quick-action', [ClientNoteController::class, 'applyQuickAction'])->name('client-notes.apply_quick_action');
    Route::post('client-notes/showVerified/{id}', [ClientNoteController::class, 'showVerified'])->name('client-notes.show_verified');
    Route::resource('client-notes', ClientNoteController::class);
    Route::get('client-docs/download/{id}', [ClientDocController::class, 'download'])->name('client-docs.download');
    Route::resource('client-docs', ClientDocController::class);
    // client category & subcategory
    Route::resource('clientCategory', ClientCategoryController::class);
    Route::get('getClientSubCategories/{id}', [ClientSubCategoryController::class, 'getSubCategories'])->name('get_client_sub_categories');
    Route::resource('clientSubCategory', ClientSubCategoryController::class);
    Route::resource('projectCategory', ProjectCategoryController::class);
    Route::resource('ProjectSubCategory', ProjectSubCategoryController::class);
    Route::get('get_project_sub_category/{id}', [ProjectSubCategoryController::class, 'getSubCategories'])->name('project.get_project_sub_category');
            // Discussion category routes
            Route::resource('discussion-category', DiscussionCategoryController::class);
    Route::resource('productCategory', ProductCategoryController::class);
    Route::get('getProductSubCategories/{id}', [ProductSubCategoryController::class, 'getSubCategories'])->name('get_product_sub_categories');
    Route::resource('productSubCategory', ProductSubCategoryController::class);
    /* KnowledgeBase category */
    Route::resource('knowledgebasecategory', KnowledgeBaseCategoryController::class);
    Route::get('tasks/client-detail', [TaskController::class, 'clientDetail'])->name('tasks.clientDetail');
    // Lead Files
    Route::get('deal-files/download/{id}', [LeadFileController::class, 'download'])->name('deal-files.download');
    Route::get('deal-files/layout', [LeadFileController::class, 'layout'])->name('deal-files.layout');
    Route::resource('deal-files', LeadFileController::class);
    // Follow up
    Route::get('deals/follow-up/{leadID}', [DealController::class, 'followUpCreate'])->name('deals.follow_up');
    Route::post('deals/follow-up-store', [DealController::class, 'followUpStore'])->name('deals.follow_up_store');
    Route::get('deals/follow-up-edit/{id?}', [DealController::class, 'editFollow'])->name('deals.follow_up_edit');
    Route::post('deals/follow-up-update', [DealController::class, 'updateFollow'])->name('deals.follow_up_update');
    Route::post('deals/follow-up-delete/{id}', [DealController::class, 'deleteFollow'])->name('deals.follow_up_delete');
    // Change status
    Route::get('stage-change/{id}', [DealController::class, 'stageChange'])->name('deals.stage_change');
    Route::post('save-stage-change', [DealController::class, 'saveStageChange'])->name('deals.save_stage_change');
    Route::post('deals/change-stage', [DealController::class, 'changeStage'])->name('deals.change_stage');
    Route::post('deals/apply-quick-action', [DealController::class, 'applyQuickAction'])->name('deals.apply_quick_action');
    Route::get('deals/gdpr-consent', [DealController::class, 'consent'])->name('deals.gdpr_consent');
    Route::post('deals/save-deal-consent/{deal}', [DealController::class, 'saveLeadConsent'])->name('deals.save_lead_consent');
    Route::post('deals/change-follow-up-status', [DealController::class, 'changeFollowUpStatus'])->name('deals.change_follow_up_status');
    // Lead Category
    Route::post('/update-lead-category', [LeadCategoryController::class, 'updateLeadCategory'])->name('category.updateDefault');
    Route::resource('leadCategory', LeadCategoryController::class);
    // Lead Note
    Route::get('lead-notes/ask-for-password/{id}', [LeadNoteController::class, 'askForPassword'])->name('lead-notes.ask_for_password');
    Route::post('lead-notes/check-password', [LeadNoteController::class, 'checkPassword'])->name('lead-notes.check_password');
    Route::post('lead-notes/apply-quick-action', [LeadNoteController::class, 'applyQuickAction'])->name('lead-notes.apply_quick_action');
    Route::resource('lead-notes', LeadNoteController::class);
    // Deal Note
    Route::post('deal-notes/apply-quick-action', [DealNoteController::class, 'applyQuickAction'])->name('deal-notes.apply_quick_action');
    Route::resource('deal-notes', DealNoteController::class);
    // deal board routes
    Route::post('leadboards/get-stage-slug', [LeadBoardController::class, 'getStageSlug'])->name('leadboards.get_stage_slug');
    Route::post('leadboards/collapseColumn', [LeadBoardController::class, 'collapseColumn'])->name('leadboards.collapse_column');
    Route::post('leadboards/updateIndex', [LeadBoardController::class, 'updateIndex'])->name('leadboards.update_index');
    Route::get('leadboards/loadMore', [LeadBoardController::class, 'loadMore'])->name('leadboards.load_more');
    Route::resource('leadboards', LeadBoardController::class);
    Route::post('lead-form/sortFields', [LeadCustomFormController::class, 'sortFields'])->name('lead-form.sortFields');
    Route::resource('lead-form', LeadCustomFormController::class);
    Route::group(['prefix' => 'deals'], function () {
        Route::get('import', [DealController::class, 'importLead'])->name('deals.import');
        Route::post('import', [DealController::class, 'importStore'])->name('deals.import.store');
        Route::post('import/process', [DealController::class, 'importProcess'])->name('deals.import.process');
    });
    Route::group(['prefix' => 'lead-contact'], function () {
        Route::get('import', [LeadContactController::class, 'importLead'])->name('lead-contact.import');
        Route::post('import', [LeadContactController::class, 'importStore'])->name('lead-contact.import.store');
        Route::post('import/process', [LeadContactController::class, 'importProcess'])->name('lead-contact.import.process');
    });
    // deals route
    Route::resource('lead-contact', LeadContactController::class);
    Route::post('lead-contact/apply-quick-action', [LeadContactController::class, 'applyQuickAction'])->name('lead-contact.apply_quick_action');
    Route::get('deals/get-stage/{id}', [DealController::class, 'getStages'])->name('deals.get-stage');
    Route::get('deals/get-deals/{id}', [DealController::class, 'getDeals'])->name('deals.get-deals');
    Route::get('deals/get-agent/{id}', [DealController::class, 'getAgents'])->name('deals.get_agents');
    Route::resource('deals', DealController::class);
    Route::get('invoices/get-client-company/{projectID?}', [InvoiceController::class, 'getClientOrCompanyName'])->name('invoices.get_client_company');
    Route::get('invoices/product-category/{id}', [InvoiceController::class, 'productCategory'])->name('invoices.product_category');
    Route::post('invoices/add-shipping-address/{clientId}', [InvoiceController::class, 'addShippingAddress'])->name('invoices.add_shipping_address');
    // Estimates
    Route::get('estimates/delete-image', [EstimateController::class, 'deleteEstimateItemImage'])->name('estimates.delete_image');
    Route::get('estimates/download/{id}', [EstimateController::class, 'download'])->name('estimates.download');
    Route::post('estimates/send-estimate/{id}', [EstimateController::class, 'sendEstimate'])->name('estimates.send_estimate');
    Route::get('estimates/change-status/{id}', [EstimateController::class, 'changeStatus'])->name('estimates.change_status');
    Route::post('estimates/accept/{id}', [EstimateController::class, 'accept'])->name('estimates.accept');
    Route::post('estimates/decline/{id}', [EstimateController::class, 'decline'])->name('estimates.decline');
    Route::get('estimates/add-item', [EstimateController::class, 'addItem'])->name('estimates.add_item');
    Route::resource('estimates', EstimateController::class);
    // Proposals
    Route::get('proposals/delete-image', [ProposalController::class, 'deleteProposalItemImage'])->name('proposals.delete_image');
    Route::get('proposals/download/{id}', [ProposalController::class, 'download'])->name('proposals.download');
    Route::post('proposals/send-proposal/{id}', [ProposalController::class, 'sendProposal'])->name('proposals.send_proposal');
    Route::get('proposals/add-item', [ProposalController::class, 'addItem'])->name('proposals.add_item');
    Route::resource('proposals', ProposalController::class);
    // Proposal Template
    Route::post('proposal-template/apply-quick-action', [ProposalTemplateController::class, 'applyQuickAction'])->name('proposal_template.apply_quick_action');
    Route::get('proposal-template/add-item', [ProposalController::class, 'addItem'])->name('proposal-template.add_item');
    Route::resource('proposal-template', ProposalTemplateController::class);
    Route::get('proposal-template/download/{id}', [ProposalTemplateController::class, 'download'])->name('proposal-template.download');
    Route::get('proposals-template/delete-image', [ProposalTemplateController::class, 'deleteProposalItemImage'])->name('proposal_template.delete_image');
    Route::resource('expenseCategory', ExpenseCategoryController::class);
    // Contracts
    Route::post('contracts/apply-quick-action', [ContractController::class, 'applyQuickAction'])->name('contracts.apply_quick_action');
    Route::get('contracts/download/{id}', [ContractController::class, 'download'])->name('contracts.download');
    Route::post('contracts/sign/{id}', [ContractController::class, 'sign'])->name('contracts.sign');
    Route::post('companySign/sign/{id}', [ContractController::class, 'companySign'])->name('companySign.sign');
    Route::get('companySignStore/sign/{id}', [ContractController::class, 'companiesSign'])->name('companySignStore.sign');
    Route::post('contracts/project-detail/{id}', [ContractController::class, 'projectDetail'])->name('contracts.project_detail');
    Route::get('contracts/company-sig/{id}', [ContractController::class, 'companySig'])->name('contracts.company_sig');
    Route::group(['prefix' => 'contracts'], function () {
        Route::resource('contractDiscussions', ContractDiscussionController::class);
        Route::get('contractFiles/download/{id}', [ContractFileController::class, 'download'])->name('contractFiles.download');
        Route::resource('contractFiles', ContractFileController::class);
        Route::resource('contractTypes', ContractTypeController::class);
    });
    Route::resource('contracts', ContractController::class);
    Route::resource('contract-renew', ContractRenewController::class);
    // Contract template
    Route::post('contract-template/apply-quick-action', [ContractTemplateController::class, 'applyQuickAction'])->name('contract_template.apply_quick_action');
    Route::resource('contract-template', ContractTemplateController::class);
    Route::get('contract-template/download/{id}', [ContractTemplateController::class, 'download'])->name('contract-template.download');
    Route::get('expense-report/expense-category-report', [ExpenseReportController::class, 'expenseCategoryReport'])->name('expense-report.expense_category_report');
    Route::get('deal-report/lead', [LeadReportController::class, 'leadContact'])->name('lead-report.lead_contact');
    Route::get('lead-report/total', [LeadReportController::class, 'totalContact'])->name('lead-report.total_contact');
    Route::get('deal-report/chart', [LeadReportController::class, 'averageDealSizeReport'])->name('lead-report.chart');
    Route::get('deal-report/profile', [LeadReportController::class, 'profile'])->name('lead-report.profile');
    Route::get('deal-report/export/{year}/{pipeline}/{category}', [LeadReportController::class, 'exportDealReport'])->name('deal-report.export');
    Route::resource('lead-report', LeadReportController::class);
    Route::get('gdpr/lead/approve-reject/{id}/{type}', [GdprSettingsController::class, 'approveRejectLead'])->name('gdpr.lead.approve_reject');
    Route::get('gdpr/customer/approve-reject/{id}/{type}', [GdprSettingsController::class, 'approveRejectClient'])->name('gdpr.customer.approve_reject');
    Route::post('gdpr/update-client-consent', [GdprController::class, 'updateClientConsent'])->name('gdpr.update_client_consent');
    // Estimate Template
    Route::get('estimate-template/add-item', [EstimateTemplateController::class, 'addItem'])->name('estimate-template.add_item');
    Route::resource('estimate-template', EstimateTemplateController::class);
    Route::get('estimates-template/delete-image', [EstimateTemplateController::class, 'deleteEstimateItemImage'])->name('estimate-template.delete_image');
    Route::get('estimate-template/download/{id}', [EstimateTemplateController::class, 'download'])->name('estimate-template.download');
    // Estimate Request
    Route::post('estimate-request/apply-quick-action', [EstimateRequestController::class, 'applyQuickAction'])->name('estimate-request.apply_quick_action');
    Route::post('estimate-request/change-status/', [EstimateRequestController::class, 'changeStatus'])->name('estimate-request.change_status');
    Route::get('estimate-request-confirm-rejected/{id}', [EstimateRequestController::class, 'rejectConfirmation'])->name('estimate-request.confirm_rejected');
    Route::get('estimate-request/send-estimate-request', [EstimateRequestController::class, 'sendEstimateRequest'])->name('estimate-request.send_estimate_request');
    Route::post('estimate-request/send_estimate_mail', [EstimateRequestController::class, 'sendEstimateMail'])->name('estimate-request.send_estimate_mail');
    Route::resource('estimate-request', EstimateRequestController::class);
