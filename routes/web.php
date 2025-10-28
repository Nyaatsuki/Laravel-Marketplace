<?php

use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', [AdvertisementController::class, 'index'])->name('home');

route::get('post', [AdvertisementController::class, 'create'])->middleware('auth');
Route::get('advertisement/{advertisement:slug}', [AdvertisementController::class, 'show']);
route::post('create-post', [AdvertisementController::class, 'store'])->middleware('auth');

Route::get('advertisement/{advertisement:slug}/edit', [AdvertisementController::class, 'edit'])->middleware('auth');
Route::put('advertisement/{advertisement:slug}/edit', [AdvertisementController::class, 'update'])->middleware('auth');

Route::delete('advertisement/{advertisement:slug}', [AdvertisementController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name("login");
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('register', [SessionsController::class, 'register'])->middleware('guest');
Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth');