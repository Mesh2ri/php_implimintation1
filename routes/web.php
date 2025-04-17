<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/home', [ProductController::class, 'gethome']) -> name("home");
Route::get('/products', [ProductController::class, 'getproduct']) -> name("products");
Route::get('/callus', [ProductController::class, 'getcall']) -> name("callus");
Route::get('/about', [ProductController::class, 'getabout']) -> name("about");






Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
