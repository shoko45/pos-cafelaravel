<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionController;

// CRUD untuk semua entitas
Route::get("/", [ProductController::class, 'index'])->name('index.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('index.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('index.store');
route::get('/produk/edit{id}', [ProductController::class, 'edit'])->name('index.edit');
route::put('/produk/update{id}', [ProductController::class, 'update'])->name('index.update');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('transaction-details', TransactionDetailController::class);
Route::resource('transactions', TransactionController::class);

