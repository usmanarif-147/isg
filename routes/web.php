<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/**
 * Temp
 */

Route::get('/admin/view', function () {
    return view('temp.adminview');
});

Route::get('/', function () {
    return redirect()->route('student.login');
});


Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    dd("cache cleared");
});

Route::get('/storage-link-artisan', function () {
    Artisan::call('storage:link');
    dd("storage linked");
});

Route::get('/storage-link', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/public/storage';
    symlink($targetFolder, $linkFolder);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/student.php';
require __DIR__ . '/school.php';
