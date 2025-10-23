<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', [PostController::class, 'index'])->name('home');

route::get('post', [PostController::class, 'create'])->middleware('auth');
Route::get('advertisement/{post:slug}', [PostController::class, 'show']);
route::post('create-post', [PostController::class, 'store'])->middleware('auth');


Route::get('posts/{post:slug}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::put('posts/{post:slug}/edit', [PostController::class, 'update'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name("login");
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('register', [SessionsController::class, 'register'])->middleware('guest');
Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth');