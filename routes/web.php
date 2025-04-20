<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/home', [ProductController::class, 'gethome']) -> name("home");
Route::get('/products', [ProductController::class, 'getproduct']) -> name("products");
Route::get('/callus', [ProductController::class, 'getcall']) -> name("callus");
Route::get('/about', [ProductController::class, 'getabout']) -> name("about");



Route::get('/dashboard', [DashboardController::class, 'getindex']) -> name('dashboard');







Auth::routes();
