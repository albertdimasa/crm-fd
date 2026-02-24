<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'multi-company-select', 'email_verified'], 'prefix' => 'account'], function () {
    require __DIR__ . '/web/hr.php';
    require __DIR__ . '/web/crm.php';
    require __DIR__ . '/web/project.php';
    require __DIR__ . '/web/finance.php';
    require __DIR__ . '/web/product.php';
    require __DIR__ . '/web/ticket.php';
    require __DIR__ . '/web/report.php';
    require __DIR__ . '/web/setting.php';
    require __DIR__ . '/web/misc.php';
});
// Test broadcasting
Route::get('/test-broadcast', function () {
    try {
        event(new \Modules\Chat\Events\MessageSent(\Modules\Chat\Entities\ChatMessage::first()));
        return response()->json(['success' => true, 'message' => 'Event broadcasted successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
})->name('test-broadcast');

// Debug broadcasting configuration 
Route::get('/debug-broadcast', function () {
    return response()->json([
        'broadcast_driver' => config('broadcasting.default'),
        'pusher_key' => config('broadcasting.connections.pusher.key'),
        'pusher_cluster' => config('broadcasting.connections.pusher.options.host'),
        'app_env' => config('app.env'),
        'queue_connection' => config('queue.default')
    ]);
})->name('debug-broadcast');
