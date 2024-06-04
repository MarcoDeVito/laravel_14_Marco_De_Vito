<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::resource('posts', PostController::class);
Route::post('/posts/{user}', [PostController::class,'store'])->name("posts.storeU");
Route::put('/posts/{post}/{user}', [PostController::class,'update'])->name("posts.updateU");
Route::get('/users', [UserController::class,'index'])->name("users.index");
Route::get('/users/{user}', [UserController::class,'show'])->name("users.show");
Route::resource('tags', TagController::class);