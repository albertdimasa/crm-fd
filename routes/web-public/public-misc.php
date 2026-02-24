<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublicUrlController;





Route::get('/invitation/{code}', [RegisterController::class, 'invitation'])->name('invitation');
Route::post('/invitation/accept-invite', [RegisterController::class, 'acceptInvite'])->name('accept_invite');



Route::get('/change-lang/{locale}', [HomeController::class, 'changeLang'])->name('front.changeLang');
Route::get('front/show-image', [HomeController::class, 'showImage'])->name('front.public.show_image');
Route::get('front/show-piechart', [HomeController::class, 'showPieChart'])->name('front.public.show_piechart');
Route::get('/check-env', [PublicUrlController::class, 'checkEnv'])->name('front.check-env');

// Socialite routes
Route::get('/redirect/{provider}', [LoginController::class, 'redirect'])->name('social_login');
Route::get('/callback/{provider}', [LoginController::class, 'callback'])->name('social_login_callback');
Route::post('check-email', [LoginController::class, 'checkEmail'])->name('check_email');
Route::post('/check-code', [LoginController::class, 'checkCode'])->name('check_code');
Route::get('resend-code', [LoginController::class, 'resendCode'])->name('resend_code');

Route::post('setup-account', [RegisterController::class, 'setupAccount'])->name('setup_account');

// Get quill image uploaded
Route::get('quill-image/{image}', [ImageController::class, 'getImage'])->name('image.getImage');

// Cropper Model
Route::get('cropper/{element}', [ImageController::class, 'cropper'])->name('cropper');

// Sync user permissions
Route::get('sync-user-permissions', [HomeController::class, 'syncPermissions'])->name('sync_user_permissions');

Route::get('file/{type}/{path}', [FileController::class, 'getFile'])->name('file.getFile');
