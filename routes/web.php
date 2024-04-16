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
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');

    Route::delete('/products', [ProductsController::class, 'destroy'])->name('products.destroy');

});

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
Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy')->middleware('auth');

require __DIR__.'/auth.php';
