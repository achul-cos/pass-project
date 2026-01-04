<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginControllerPenumpang;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\PenumpangLoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredUserControllerPenumpang;
use App\Http\Controllers\Auth\RegisteredUserControllerPetugas;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/register/petugas', [RegisteredUserControllerPetugas::class, 'store'])
    ->middleware('guest')
    ->name('register.petugas');
    
Route::post('/register/penumpang', [RegisteredUserControllerPenumpang::class, 'store'])
    ->middleware('guest')
    ->name('register.penumpang');    

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/login/penumpang', [PenumpangLoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.penumpang');

Route::post('/login/petugas', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
    
Route::post('/logout/penumpang', [PenumpangLoginController::class, 'destroy'])
    ->middleware('auth:sanctum_penumpang')
    ->name('logout.penumpang');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
