<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('/comments', CommentController::class);
});

Route::middleware(['auth', 'role:admin|writer'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('posts/{post}', [PostController::class,'update'])->name('posts.update');
    Route::get('posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
});

Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });
});

require __DIR__.'/auth.php';
