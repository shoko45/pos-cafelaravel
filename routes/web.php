<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\LoginController;

//product
Route::resource('products', ProductController::class);
Route::get("/", [ProductController::class, 'index'])->name('index.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('index.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('index.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('index.edit');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('index.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('index.destroy');

//login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//dll
Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('transaction-details', TransactionDetailController::class);
Route::resource('transactions', TransactionController::class);

