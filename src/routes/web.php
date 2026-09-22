<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PageContoller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageContoller::class, 'index']);
// Route::get('/blog', [PageContoller::class, 'blog'])->name('blog');
Route::get('/about', [PageContoller::class, 'about'])->name('about');

Route::resource('posts', PostController::class);