<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventFileController;
use App\Http\Controllers\StickyNoteController;
use App\Http\Controllers\MessageFileController;
use App\Http\Controllers\AppreciationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EventCalendarController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\RecurringEventController;
use App\Http\Controllers\KnowledgeBaseFileController;
use App\Http\Controllers\NoticeFileController;
use App\Http\Controllers\MyCalendarController;

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard-advanced', [DashboardController::class, 'advancedDashboard'])->name('dashboard.advanced');
    Route::post('dashboard/widget/{dashboardType}', [DashboardController::class, 'widget'])->name('dashboard.widget');
    Route::get('dashboard/private_calendar', [DashboardController::class, 'privateCalendar'])->name('dashboard.private_calendar');
    Route::group(
        ['prefix' => 'projects'],
        function () {
        }
    );
    Route::group(
        ['prefix' => 'products'],
        function () {
        }
    );
    /* NOTICE */
    Route::post('notices/apply-quick-action', [NoticeController::class, 'applyQuickAction'])->name('notices.apply_quick_action');
    Route::resource('notices', NoticeController::class);
    /* Notice files */
    Route::get('notice-files/download/{id}', [NoticeFileController::class, 'download'])->name('notice_files.download');
    Route::resource('notice-files', NoticeFileController::class);
    /* User Appreciation */
    Route::group(
        ['prefix' => 'appreciations'],
        function () {
            Route::post('awards/apply-quick-action', [AwardController::class, 'applyQuickAction'])->name('awards.apply_quick_action');
            Route::post('awards/change-status/{id?}', [AwardController::class, 'changeStatus'])->name('awards.change-status');
            Route::get('awards/quick-create', [AwardController::class, 'quickCreate'])->name('awards.quick-create');
            Route::post('awards/quick-store', [AwardController::class, 'quickStore'])->name('awards.quick-store');
            Route::resource('awards', AwardController::class);
        }
    );
    Route::post('appreciations/apply-quick-action', [AppreciationController::class, 'applyQuickAction'])->name('appreciations.apply_quick_action');
    Route::resource('appreciations', AppreciationController::class);
    /* KnowledgeBase */
    Route::get('knowledgebase/create/{id?}', [KnowledgeBaseController::class, 'create'])->name('knowledgebase.create');
    Route::post('knowledgebase/apply-quick-action', [KnowledgeBaseController::class, 'applyQuickAction'])->name('knowledgebase.apply_quick_action');
    Route::get('knowledgebase/searchquery/{query?}', [KnowledgeBaseController::class, 'searchQuery'])->name('knowledgebase.searchQuery');
    Route::resource('knowledgebase', KnowledgeBaseController::class)->except(['create']);
    Route::get('knowledgebase-files/download/{id}', [KnowledgeBaseFileController::class, 'download'])->name('knowledgebase-files.download');
    Route::resource('knowledgebase-files', KnowledgeBaseFileController::class);
    Route::group(['prefix' => 'events'], function () {
        Route::post('recurring-event/event-monthly-on', [RecurringEventController::class, 'monthlyOn'])->name('recurring-event.monthly_on');
        Route::post('recurring-event/apply-quick-action', [RecurringEventController::class, 'applyQuickAction'])->name('recurring-event.apply_quick_action');
        Route::resource('recurring-event', RecurringEventController::class);
        Route::post('recurring-event/updateStatus/{id}', [RecurringEventController::class, 'updateStatus'])->name('recurring-event.update_status');
        Route::get('recurring-event/event-status-note/{id}', [RecurringEventController::class, 'eventStatusNote'])->name('recurring-event.event_status_note');
    });
    /* EVENTS */
    Route::post('event-monthly-on', [EventCalendarController::class, 'monthlyOn'])->name('events.monthly_on');
    Route::get('events/table-view', [EventCalendarController::class, 'tableView'])->name('events.table_view');
    Route::post('events/apply-quick-action', [EventCalendarController::class, 'applyQuickAction'])->name('events.apply_quick_action');
    Route::resource('events', EventCalendarController::class);
    Route::post('updateStatus/{id}', [EventCalendarController::class, 'updateStatus'])->name('events.update_status');
    Route::get('events/event-status-note/{id}', [EventCalendarController::class, 'eventStatusNote'])->name('events.event_status_note');
    /* My Calendar */
    Route::get('my-calendar', [MyCalendarController::class, 'index'])->name('my-calendar.index');
    /* Event Files */
    Route::get('event-files/download/{id}', [EventFileController::class, 'download'])->name('event-files.download');
    Route::resource('event-files', EventFileController::class);
    // Messages
    Route::get('messages/fetch-user-list', [MessageController::class, 'fetchUserListView'])->name('messages.fetch_user_list');
    Route::post('messages/fetch_messages/{id}', [MessageController::class, 'fetchUserMessages'])->name('messages.fetch_messages');
    Route::post('messages/check_messages', [MessageController::class, 'checkNewMessages'])->name('messages.check_new_message');
    Route::delete('messages/destroy-chat/{id}', [MessageController::class, 'destroyAll'])->name('messages.destroy_all');
    Route::resource('messages', MessageController::class);
    // Chat Files
    Route::get('message-file/download/{id}', [MessageFileController::class, 'download'])->name('message_file.download');
    Route::resource('message-file', MessageFileController::class);
    Route::resource('sticky-notes', StickyNoteController::class);
    Route::post('show-notifications', [NotificationController::class, 'showNotifications'])->name('show_notifications');
    Route::get('all-notifications', [NotificationController::class, 'all'])->name('all-notifications');
    Route::post('mark-read', [NotificationController::class, 'markRead'])->name('mark_single_notification_read');
    Route::post('mark_notification_read', [NotificationController::class, 'markAllRead'])->name('mark_notification_read');
    Route::resource('search', SearchController::class);
