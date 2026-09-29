<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageContoller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageContoller::class, 'index'])->name('index');
Route::get('/about', [PageContoller::class, 'about'])->name('about');
Route::get('/login', [PageContoller::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('register_store', [AuthController::class, 'register_store'])->name('register_store');

// Coments avvalgidek qoladi
Route::resource('coments', ComentController::class);

// Postslar esa 2 ga bo'linadi:
Route::resource('posts', PostController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('posts', PostController::class)->only(['index', 'show']);
