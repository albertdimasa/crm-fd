<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TimelogController;
use App\Http\Controllers\TaskFileController;
use App\Http\Controllers\TaskNoteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskBoardController;
use App\Http\Controllers\TaskLabelController;
use App\Http\Controllers\ProjectLabelController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\TaskReportController;
use App\Http\Controllers\ProjectFileController;
use App\Http\Controllers\ProjectNoteController;
use App\Http\Controllers\SubTaskFileController;
use App\Http\Controllers\TaskCommentController;
use App\Http\Controllers\TaskCalendarController;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\ProjectRatingController;
use App\Http\Controllers\TimelogReportController;
use App\Http\Controllers\DiscussionFilesController;
use App\Http\Controllers\DiscussionReplyController;
use App\Http\Controllers\ProjectCalendarController;
use App\Http\Controllers\ProjectTemplateController;
use App\Http\Controllers\TimelogCalendarController;
use App\Http\Controllers\RecurringTaskController;
use App\Http\Controllers\ProjectMilestoneController;
use App\Http\Controllers\ProjectTemplateTaskController;
use App\Http\Controllers\ProjectTimelogBreakController;
use App\Http\Controllers\ProjectTemplateMemberController;
use App\Http\Controllers\ProjectTemplateSubTaskController;
use App\Http\Controllers\GanttLinkController;
use App\Http\Controllers\ProjectTemplateMilestoneController;
use App\Http\Controllers\TimelogWeeklyApprovalController;
use App\Http\Controllers\WeeklyTimesheetController;

    Route::post('dashboard/week-timelog', [DashboardController::class, 'weekTimelog'])->name('dashboard.week_timelog');
    /* PROJECTS */
    Route::post('projects/change-status', [ProjectController::class, 'changeProjectStatus'])->name('projects.change_status');
            Route::get('import', [ProjectController::class, 'importProject'])->name('projects.import');
            Route::post('import', [ProjectController::class, 'importStore'])->name('projects.import.store');
            Route::post('import/process', [ProjectController::class, 'importProcess'])->name('projects.import.process');
            Route::post('assignProjectAdmin', [ProjectController::class, 'assignProjectAdmin'])->name('projects.assign_project_admin');
            Route::post('archive-restore/{id}', [ProjectController::class, 'archiveRestore'])->name('projects.archive_restore');
            Route::post('archive-delete/{id}', [ProjectController::class, 'archiveDestroy'])->name('projects.archive_delete');
            Route::get('archive', [ProjectController::class, 'archive'])->name('projects.archive');
            Route::post('apply-quick-action', [ProjectController::class, 'applyQuickAction'])->name('projects.apply_quick_action');
            Route::post('updateStatus/{id}', [ProjectController::class, 'updateStatus'])->name('projects.update_status');
            Route::post('store-pin', [ProjectController::class, 'storePin'])->name('projects.store_pin');
            Route::post('destroy-pin/{id}', [ProjectController::class, 'destroyPin'])->name('projects.destroy_pin');
            Route::post('gantt-data', [ProjectController::class, 'ganttData'])->name('projects.gantt_data');
            Route::post('invoiceList/{id}', [ProjectController::class, 'invoiceList'])->name('projects.invoice_list');
            Route::get('duplicate-project/{id}', [ProjectController::class, 'duplicateProject'])->name('projects.duplicate_project');
            Route::get('members/{id}', [ProjectController::class, 'members'])->name('projects.members');
            Route::get('pendingTasks/{id}', [ProjectController::class, 'pendingTasks'])->name('projects.pendingTasks');
            Route::get('labels/{id}', [TaskLabelController::class, 'labels'])->name('projects.labels');
            Route::resource('project-label', ProjectLabelController::class);
            Route::post('project-members/save-group', [ProjectMemberController::class, 'storeGroup'])->name('project-members.store_group');
            Route::resource('project-members', ProjectMemberController::class);
            Route::post('files/store-link', [ProjectFileController::class, 'storeLink'])->name('files.store_link');
            Route::get('files/download/{id}', [ProjectFileController::class, 'download'])->name('files.download');
            Route::get('files/thumbnail', [ProjectFileController::class, 'thumbnailShow'])->name('files.thumbnail');
            Route::post('files/multiple-upload', [ProjectFileController::class, 'storeMultiple'])->name('files.multiple_upload');
            Route::resource('files', ProjectFileController::class);
            Route::get('milestones/byProject/{id}', [ProjectMilestoneController::class, 'byProject'])->name('milestones.by_project');
            Route::post('/milestones/{id}/update-status', [ProjectMilestoneController::class, 'updateStatus'])->name('milestones.updateStatus');
            Route::resource('milestones', ProjectMilestoneController::class);
            Route::post('discussion/setBestAnswer', [DiscussionController::class, 'setBestAnswer'])->name('discussion.set_best_answer');
            Route::resource('discussion', DiscussionController::class);
            Route::get('discussion-reply/get-replies/{id}', [DiscussionReplyController::class, 'getReplies'])->name('discussion-reply.get_replies');
            Route::resource('discussion-reply', DiscussionReplyController::class);
            // Discussion Files
            Route::get('discussion-files/download/{id}', [DiscussionFilesController::class, 'download'])->name('discussion_file.download');
            Route::resource('discussion-files', DiscussionFilesController::class);
            // Rating routes
            Route::resource('project-ratings', ProjectRatingController::class);
            Route::get('projects/burndown/{projectId?}', [ProjectController::class, 'burndown'])->name('projects.burndown');
            /* PROJECT TEMPLATE */
            Route::post('project-template/apply-quick-action', [ProjectTemplateController::class, 'applyQuickAction'])->name('project_template.apply_quick_action');
            Route::resource('project-template', ProjectTemplateController::class);
            Route::post('project-template-members/save-group', [ProjectTemplateMemberController::class, 'storeGroup'])->name('project_template_members.store_group');
            Route::resource('project-template-member', ProjectTemplateMemberController::class);
            Route::get('project-template-task/data/{templateId?}', [ProjectTemplateTaskController::class, 'data'])->name('project_template_task.data');
            Route::get('project-template-milestones/byProject/{id}', [ProjectTemplateMilestoneController::class, 'byProject'])->name('project-template-milestone.by_project');
            Route::post('/project-template-milestones/{id}/update-status', [ProjectTemplateMilestoneController::class, 'updateStatus'])->name('project-template-milestone.updateStatus');
            Route::resource('project-template-task', ProjectTemplateTaskController::class);
            Route::resource('project-template-milestone', ProjectTemplateMilestoneController::class);
            Route::resource('project-template-sub-task', ProjectTemplateSubTaskController::class);
            Route::resource('project-calendar', ProjectCalendarController::class);
    Route::get('project-notes/ask-for-password/{id}', [ProjectNoteController::class, 'askForPassword'])->name('project_notes.ask_for_password');
    Route::post('project-notes/check-password', [ProjectNoteController::class, 'checkPassword'])->name('project_notes.check_password');
    Route::post('project-notes/apply-quick-action', [ProjectNoteController::class, 'applyQuickAction'])->name('project_notes.apply_quick_action');
    Route::resource('project-notes', ProjectNoteController::class);
    Route::get('projects-ajax', [ProjectController::class, 'ajaxLoadProject'])->name('get.projects-ajax');
    Route::get('get-projects', [ProjectController::class, 'getProjects'])->name('get.projects');
    Route::resource('projects', ProjectController::class);
    /* TASKS */
    Route::post('tasks/change-status', [TaskController::class, 'changeStatus'])->name('tasks.change_status');
    Route::post('tasks/change-milestone', [TaskController::class, 'milestoneChange'])->name('tasks.change_milestone');
    Route::post('tasks/apply-quick-action', [TaskController::class, 'applyQuickAction'])->name('tasks.apply_quick_action');
    Route::post('tasks/store-pin', [TaskController::class, 'storePin'])->name('tasks.store_pin');
    Route::post('tasks/reminder', [TaskController::class, 'reminder'])->name('tasks.reminder');
    Route::post('tasks/destroy-pin/{id}', [TaskController::class, 'destroyPin'])->name('tasks.destroy_pin');
    Route::post('tasks/check-task/{taskID}', [TaskController::class, 'checkTask'])->name('tasks.check_task');
    Route::post('tasks/send-approval', [TaskController::class, 'sendApproval'])->name('tasks.send_approval');
    Route::post('tasks/gantt-task-update/{id}', [TaskController::class, 'updateTaskDuration'])->name('tasks.gantt_task_update');
    Route::get('tasks/members/{id}', [TaskController::class, 'members'])->name('tasks.members');
    Route::get('tasks/project_tasks/{id}', [TaskController::class, 'projectTasks'])->name('tasks.project_tasks');
    Route::get('tasks/waiting-approval', [TaskController::class, 'waitingApproval'])->name('tasks.waiting-approval');
    Route::get('tasks/show-waiting-approval-change-status-modal', [TaskController::class, 'statusReason'])->name('tasks.show_status_reason_modal');
    Route::post('tasks/store-status-reason', [TaskController::class, 'storeStatusReason'])->name('tasks.store_comment_on_change_status');
    Route::group(['prefix' => 'tasks'], function () {

        Route::post('recurring-task/apply-quick-action', [RecurringTaskController::class, 'applyQuickAction'])->name('recurring-task.apply_quick_action');
        Route::resource('recurring-task', RecurringTaskController::class);

        Route::resource('task-label', TaskLabelController::class);
        Route::resource('taskCategory', TaskCategoryController::class);
        Route::post('taskComment/save-comment-like', [TaskCommentController::class, 'saveCommentLike'])->name('taskComment.save_comment_like');
        Route::resource('taskComment', TaskCommentController::class);
        Route::resource('task-note', TaskNoteController::class);

        // task files routes
        Route::get('task-files/download/{id}', [TaskFileController::class, 'download'])->name('task_files.download');
        Route::resource('task-files', TaskFileController::class);

        // Sub task routes
        Route::post('sub-task/change-status', [SubTaskController::class, 'changeStatus'])->name('sub_tasks.change_status');
        Route::resource('sub-tasks', SubTaskController::class);

        // Task files routes
        Route::get('sub-task-files/download/{id}', [SubTaskFileController::class, 'download'])->name('sub-task-files.download');
        Route::resource('sub-task-files', SubTaskFileController::class);

        // Taskboard routes
        Route::post('taskboards/collapseColumn', [TaskBoardController::class, 'collapseColumn'])->name('taskboards.collapse_column');
        Route::post('taskboards/updateIndex', [TaskBoardController::class, 'updateIndex'])->name('taskboards.update_index');
        Route::get('taskboards/loadMore', [TaskBoardController::class, 'loadMore'])->name('taskboards.load_more');
        Route::resource('taskboards', TaskBoardController::class);

        Route::resource('task-calendar', TaskCalendarController::class);
    });
    Route::resource('tasks', TaskController::class);
    Route::post('invoices/fetchTimelogs', [InvoiceController::class, 'fetchTimelogs'])->name('invoices.fetch_timelogs');
    // Timelogs
    Route::group(['prefix' => 'timelogs'], function () {
        Route::resource('timelog-calendar', TimelogCalendarController::class);
        Route::resource('timelog-break', ProjectTimelogBreakController::class);
        Route::get('by-employee', [TimelogController::class, 'byEmployee'])->name('timelogs.by_employee');
        Route::get('export', [TimelogController::class, 'export'])->name('timelogs.export');
        Route::get('export-time-logs', [TimelogController::class, 'exportTimeLogs'])->name('timelogs.export_time_logs');
        Route::get('show-active-timer', [TimelogController::class, 'showActiveTimer'])->name('timelogs.show_active_timer');
        Route::get('show-timer', [TimelogController::class, 'showTimer'])->name('timelogs.show_timer');
        Route::post('start-timer', [TimelogController::class, 'startTimer'])->name('timelogs.start_timer');
        Route::get('timer-data', [TimelogController::class, 'timerData'])->name('timelogs.timer_data');
        Route::post('stop-timer', [TimelogController::class, 'stopTimer'])->name('timelogs.stop_timer');
        Route::post('pause-timer', [TimelogController::class, 'pauseTimer'])->name('timelogs.pause_timer');
        Route::post('resume-timer', [TimelogController::class, 'resumeTimer'])->name('timelogs.resume_timer');
        Route::post('apply-quick-action', [TimelogController::class, 'applyQuickAction'])->name('timelogs.apply_quick_action');

        Route::post('employee_data', [TimelogController::class, 'employeeData'])->name('timelogs.employee_data');
        Route::post('user_time_logs', [TimelogController::class, 'userTimelogs'])->name('timelogs.user_time_logs');
        Route::post('approve_timelog', [TimelogController::class, 'approveTimelog'])->name('timelogs.approve_timelog');
        Route::post('revert-timelog-to-pending', [TimelogController::class, 'revertTimelogToPending'])->name('timelogs.revert_to_pending');
        Route::get('stopper-alert/{id}', [TimelogController::class, 'stopperAlert'])->name('timelogs.stopper_alert');
        Route::get('check-project-time-limit/{projectId}', [TimelogController::class, 'checkProjectTimeLimit'])->name('timelogs.check_project_time_limit');

        Route::post('change-status', [WeeklyTimesheetController::class, 'changeStatus'])->name('weekly-timesheets.change_status');
        Route::get('pending-approval', [WeeklyTimesheetController::class, 'pendingApproval'])->name('weekly-timesheets.pending_approval');
        Route::resource('weekly-timesheets', WeeklyTimesheetController::class);
    });
    Route::get('show-reject-modal', [WeeklyTimesheetController::class, 'showRejectModal'])->name('weekly-timesheets.show_reject_modal');
    Route::post('timelogs/timelogAction', [TimelogController::class, 'timelogAction'])->name('timelogs.timelog_action');
    Route::get('timelogs/show-reject-modal', [TimelogController::class, 'rejectTimelog'])->name('timelogs.show_reject_modal');
    Route::post('/calculate-time', [TimelogController::class, 'calculateTime'])->name('calculateTime');
    Route::resource('timelogs', TimelogController::class);
    Route::post('task-report-chart', [TaskReportController::class, 'taskChartData'])->name('task-report.chart');
    Route::get('task-report/consolidated-task-report', [TaskReportController::class, 'consolidatedTaskReport'])->name('consolidated-task-report');
    Route::resource('task-report', TaskReportController::class);
    Route::post('time-log-report-chart', [TimelogReportController::class, 'timelogChartData'])->name('time-log-report.chart');
    Route::get('time-log-consolidated-report', [TimelogReportController::class, 'consolidateIndex'])->name('time-log-consolidated.report');
    Route::get('time-log-project-wise-report', [TimelogReportController::class, 'projectWiseTimelog'])->name('project-wise-timelog.report');
    Route::get('project-wise-timelog/report/export', [TimelogReportController::class, 'exportProjectWiseTimeLog'])->name('project-wise-timelog.export');
    Route::resource('time-log-report', TimelogReportController::class);
    Route::post('time-log-report-time', [TimelogReportController::class, 'totalTime'])->name('time-log-report.time');
    Route::resource('time-log-weekly-report', TimelogWeeklyApprovalController::class);
    Route::get('weekly-pending-time-log-report', [TimelogWeeklyApprovalController::class, 'pendingTimelogReportIndex'])->name('weekly-pending-time-log-report.report');
    Route::post('gantt_link.task_update', [GanttLinkController::class, 'taskUpdateController'])->name('gantt_link.task_update');
    Route::resource('gantt_link', GanttLinkController::class);
