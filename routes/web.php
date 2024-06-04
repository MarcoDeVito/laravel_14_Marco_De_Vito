<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::resource('posts', PostController::class);
Route::post('/posts/{user}', [PostController::class,'store'])->name("posts.storeU");
Route::resource('tags', TagController::class);