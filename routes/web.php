<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('student.login');
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    dd("cleared");
});

Route::get('/storage-link', function () {
    $targetFolder = storage_path('app/public');
    dd($_SERVER['DOCUMENT_ROOT'] . '/public/storage');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/student.php';
require __DIR__ . '/school.php';
