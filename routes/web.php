<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')->group(function () {
    Route::resources([
        'posts'=> PostController::class,
        'users'=>UserController::class
    ]);
});

require __DIR__.'/auth.php';
