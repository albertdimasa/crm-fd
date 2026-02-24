<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveSettingController;
use App\Http\Controllers\EmployeeShiftController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\AttendanceSettingController;
use App\Http\Controllers\ShiftRotationController;

    // Route::get('check-qr-login', [AttendanceSettingController::class, 'qrClockInOut'])->name('settings.qr-login');
    // Route::post('change-qr-code-status', [AttendanceSettingController::class, 'qrCodeStatus'])->name('settings.change-qr-code-status');
    Route::resource('attendance-settings', AttendanceSettingController::class);
    // Shift Rotation routes
    Route::post('shift-rotations/change-status', [ShiftRotationController::class, 'changeStatus'])->name('shift-rotations.change_status');
    Route::get('shift-rotations/automate-shift', [ShiftRotationController::class, 'automateShift'])->name('shift-rotations.automate_shift');
    Route::post('shift-rotations/remove_employee', [ShiftRotationController::class, 'removeEmployee'])->name('shift-rotations.remove_employee');
    Route::post('shift-rotations/store-automate-shift', [ShiftRotationController::class, 'storeAutomateShift'])->name('shift-rotations.store_automate_shift');
    Route::get('shift-rotations/manage-rotation-employee/{id}', [ShiftRotationController::class, 'manageEmployees'])->name('shift-rotations.manage_rotation_employee');
    Route::post('shift-rotations/change-employee-rotation', [ShiftRotationController::class, 'changeEmployeeRotation'])->name('shift-rotations.change_employee_rotation');
    Route::get('shift-rotations/run-rotation', [ShiftRotationController::class, 'runRotation'])->name('shift-rotations.run_rotation_get');
    Route::post('shift-rotations/run-rotation', [ShiftRotationController::class, 'runRotation'])->name('shift-rotations.run_rotation_post');
    Route::resource('shift-rotations', ShiftRotationController::class);
    Route::resource('leaves-settings', LeaveSettingController::class);
    Route::post('leaves-settings/change-permission', [LeaveSettingController::class, 'changePermission'])->name('leaves-settings.changePermission');
    // LeaveType Resource
    Route::resource('leaveType', LeaveTypeController::class);
    // Role Permissions
    Route::post('role-permission/storeRole', [RolePermissionController::class, 'storeRole'])->name('role-permissions.store_role');
    Route::post('role-permission/deleteRole', [RolePermissionController::class, 'deleteRole'])->name('role-permissions.delete_role');
    Route::post('role-permissions/permissions', [RolePermissionController::class, 'permissions'])->name('role-permissions.permissions');
    Route::post('role-permissions/customPermissions', [RolePermissionController::class, 'customPermissions'])->name('role-permissions.custom_permissions');
    Route::post('role-permissions/reset-permissions', [RolePermissionController::class, 'resetPermissions'])->name('role-permissions.reset_permissions');
    Route::resource('role-permissions', RolePermissionController::class);
    Route::post('employee-shifts/set-default', [EmployeeShiftController::class, 'setDefaultShift'])->name('employee-shifts.set_default');
    Route::resource('employee-shifts', EmployeeShiftController::class);
