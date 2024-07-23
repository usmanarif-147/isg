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

    if (file_exists($linkFolder)) {
        return 'The "public/storage" directory already exists.';
    }

    $success = @exec("ln -s {$targetFolder} {$linkFolder}");

    if ($success === false) {
        return 'Failed to create a storage link. Please check your server permissions or contact your hosting provider.';
    }

    return 'Storage link created';
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/student.php';
require __DIR__ . '/school.php';
