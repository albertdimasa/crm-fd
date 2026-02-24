<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;




Route::post('/gantt-chart-data/{id}', [HomeController::class, 'ganttData'])->name('front.gantt_data');
Route::get('/gantt-chart/{hash}', [HomeController::class, 'gantt'])->name('front.gantt');

Route::get('/task-board/load-more/{hash}', [HomeController::class, 'taskboardLoadMore'])->name('front.taskboard.load_more');
Route::get('/task-board/{hash}', [HomeController::class, 'taskboard'])->name('front.taskboard');
Route::get('/task/{id}', [HomeController::class, 'taskDetail'])->name('front.task_detail');
