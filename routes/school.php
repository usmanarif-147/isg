<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['school'])->group(function () {

    Route::prefix('school')->name('school.')->group(function () {
        Route::view('/dashboard', 'school.dashboard')->name('dashboard');

        // student
        Route::view('/students', 'school.student.students')->name('students');
        Route::view('student/create', 'school.student.create')->name('student.create');
        Route::view('student/view/{id}', 'school.student.view')->name('student.view');
    });
});
