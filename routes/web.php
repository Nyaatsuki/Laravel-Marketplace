<?php

use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', [AdvertisementController::class, 'index'])->name('home');

route::get('post', [AdvertisementController::class, 'create'])->middleware('auth');
Route::get('advertisement/{post:slug}', [AdvertisementController::class, 'show']);
route::post('create-post', [AdvertisementController::class, 'store'])->middleware('auth');

Route::get('posts/{post:slug}/edit', [AdvertisementController::class, 'edit'])->middleware('auth');
Route::put('posts/{post:slug}/edit', [AdvertisementController::class, 'update'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name("login");
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('register', [SessionsController::class, 'register'])->middleware('guest');
Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth');