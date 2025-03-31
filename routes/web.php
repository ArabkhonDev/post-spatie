<?php

use App\Http\Controllers\CommentController;
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

Route::middleware(['basic.auth','role:admin|writer'])->prefix('editor')->group(function () {
    Route::get('/posts/', [PostController::class,'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
    Route::post('/posts/{post}', [PostController::class,'update'])->name('posts.update');
});

Route::prefix('user')->group(function () {
    Route::get('/posts/index', [PostController::class,'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
    Route::resource('comments', CommentController::class);
});

Route::middleware(['basic.auth', 'role:admin'])->group(function(): void{
    Route::delete('/posts/{post}/destroy', [PostController::class,'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
