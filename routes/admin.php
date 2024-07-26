<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        // school
        Route::view('/schools', 'admin.school.schools')->name('schools');
        Route::view('school/create', 'admin.school.create')->name('school.create');
        Route::view('school/view/{id}', 'admin.school.view')->name('school.view');

        // platform
        Route::view('/platforms', 'admin.platform.platforms')->name('platforms');
        Route::view('platform/create', 'admin.platform.create')->name('platform.create');
        Route::view('platform/view/{id}', 'admin.platform.view')->name('platform.view');

        // setting
        Route::view('/change-password', 'admin.settings.change-password')->name('change.password');
    });
});
