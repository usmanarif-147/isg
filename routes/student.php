<?php

use Illuminate\Support\Facades\Route;

Route::get('/{school}/{roll_number}', function () {
    return view('student.view-profile');
});

Route::middleware(['student'])->group(function () {
    Route::view('/dashboard', 'student.dashboard')
        ->name('student.dashboard');

    Route::view('/profile', 'student.profile')
        ->name('student.profile');
    Route::view('/edit-profile', 'student.edit-profile')
        ->name('student.edit.profile');

    Route::view('/share', 'student.share')
        ->name('student.share');

    Route::view('/product', 'student.product')
        ->name('student.product');

    Route::view('/card', 'student.card')
        ->name('student.card');

    Route::view('/notification', 'student.notification')
        ->name('student.notification');

    Route::view('/announcement', 'student.announcement')
        ->name('student.announcement');

    Route::view('/setting', 'student.setting')
        ->name('student.setting');
});
