<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionController;

Route::get("/", [ProductController::class, 'index'])->name('product.index');
Route::get('/', [HomeController::class, 'index']);
Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('transaction-details', TransactionDetailController::class);
Route::resource('transactions', TransactionController::class);
