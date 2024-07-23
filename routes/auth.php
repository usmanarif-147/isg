<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/**
 * Student
 */
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'createStudent'])->name('student.register');
    Route::post('register', [RegisteredUserController::class, 'storeStudent'])->name('student.register.store');
    Route::get('login', [AuthenticatedSessionController::class, 'createStudent'])->name('student.login');
    Route::post('login', [AuthenticatedSessionController::class, 'storeStudent'])->name('student.login.store');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'createStudent'])->name('student.password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'storeStudent'])->name('student.password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'createStudent'])->name('student.password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'storeStudent'])->name('student.password.store');
});

Route::middleware(['student'])->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('student.verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('student.verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'storeStudent'])->middleware('throttle:6,1')->name('student.verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'showStudent'])->name('student.password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'storeStudent'])->name('student.password.confirm.store');
    Route::put('password', [PasswordController::class, 'update'])->name('student.password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroyStudent'])->name('student.logout');
});


/**
 * Admin
 */
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthenticatedSessionController::class, 'createAdmin'])->name('admin.login');
    Route::post('admin/login', [AuthenticatedSessionController::class, 'storeAdmin'])->name('admin.login.store');
    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'createAdmin'])->name('admin.password.request');
    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'storeAdmin'])->name('admin.password.email');
    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'createAdmin'])->name('admin.password.reset');
    Route::post('admin/reset-password', [NewPasswordController::class, 'storeAdmin'])->name('admin.password.store');
});

Route::middleware(['admin'])->group(function () {
    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'showAdmin'])->name('admin.password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'storeAdmin'])->name('admin.password.confirm.store');
    Route::put('admin/password', [PasswordController::class, 'updateAdmin'])->name('admin.password.update');
    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroyAdmin'])->name('admin.logout');
});

/**
 * School
 */
Route::middleware('guest')->group(function () {
    Route::get('school/login', [AuthenticatedSessionController::class, 'createSchool'])->name('school.login');
    Route::post('school/login', [AuthenticatedSessionController::class, 'storeSchool'])->name('school.login.store');
    Route::get('school/forgot-password', [PasswordResetLinkController::class, 'createSchool'])->name('school.password.request');
    Route::post('school/forgot-password', [PasswordResetLinkController::class, 'storeSchool'])->name('school.password.email');
    Route::get('school/reset-password/{token}', [NewPasswordController::class, 'createSchool'])->name('school.password.reset');
    Route::post('school/reset-password', [NewPasswordController::class, 'storeSchool'])->name('school.password.store');
});

Route::middleware(['school'])->group(function () {
    Route::get('school/confirm-password', [ConfirmablePasswordController::class, 'showSchool'])->name('school.password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'storeSchool'])->name('school.password.confirm.store');
    Route::put('school/password', [PasswordController::class, 'updateSchool'])->name('school.password.update');
    Route::post('school/logout', [AuthenticatedSessionController::class, 'destroySchool'])->name('school.logout');
});
