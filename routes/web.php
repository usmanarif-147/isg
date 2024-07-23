<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;


Route::get('/', function () {
    return redirect()->route('student.login');
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    dd("cleared");
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

Route::get('/storage-link-three', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = public_path('storage');

    if (!File::exists($linkFolder)) {
        File::makeDirectory($linkFolder, 0755, true);
    }

    File::copyDirectory($targetFolder, $linkFolder);

    return 'Storage files copied to public/storage';
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/student.php';
require __DIR__ . '/school.php';
