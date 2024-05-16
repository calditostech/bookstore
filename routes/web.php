<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('store/create', [StoreController::class, 'create'])->name('store.create');
    Route::apiResource('books', BookController::class);
    Route::apiResource('stores', StoreController::class);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

