<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * ? Products
 * *show the stock of the product
 * !For verified users
 * 
 * !Index -> show all the batteries available and will create order here
 * !Show -> show the created order.
 * !Delete -> accomplished the selected order.
 */

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductsController::class, 'index'])->name('products.show');

/**
 * ? Orders
 * *For Customers
 * !For verified users
 * 
 * *Index -> show all the batteries available.
 * *Create -> creating an order.
 * !Show -> show the created order.
 * !Delete -> accomplished the selected order.
 */
Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');

require __DIR__.'/auth.php';
