<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("dashboard") -> middleware('auth') -> group(function () {

    Route::get("/", [DashboardController::class, 'getindex'])->name('dashboard');

    Route::prefix('categories')->group(function () {

        Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
        Route::post('/addcategories', [CategoriesController::class, 'create'])->name('categories.create');
        Route::post('/updatecategories', [CategoriesController::class, 'update'])->name('categories.update');
        Route::get('/editcategories/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::get('/delcategories/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
    });

    Route::prefix('products')->group(function () {

        Route::get('/', [ProductsController::class, 'index'])->name('product.index');
        Route::post('/addproducts', [ProductsController::class, 'create'])->name('Product.create');
        Route::post('/updateproducts', [ProductsController::class, 'update'])->name('Product.update');
        Route::get('/editproducts/{id}', [ProductsController::class, 'edit'])->name('Product.edit');
        Route::get('/delproducts/{id}', [ProductsController::class, 'delete'])->name('Product.delete');

    });
});