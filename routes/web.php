<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama dialihkan ke daftar produk
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Product CRUD (pakai resource saja sudah cukup)
Route::resource('products', ProductController::class);

// Halaman dashboard
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Jika ingin custom route terpisah, pastikan konsisten:
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Users
Route::resource('users', UserController::class);

// Category
Route::resource('categories', CategoryController::class);

// Customer
Route::resource('customers', CustomerController::class);

// Transactions & Details
Route::resource('transactions', TransactionController::class);
Route::resource('transaction-details', TransactionDetailController::class);
