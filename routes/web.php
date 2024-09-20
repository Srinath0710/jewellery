<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDetailController;
// Route::get('/customer', CustomerDetailController::class);


Route::group(['prefix' => 'customer'], function () {
    Route::get('/index', [CustomerDetailController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerDetailController::class, 'create'])->name('customer.create');  // Ensure this line exists
    Route::post('/store', [CustomerDetailController::class, 'store'])->name('customer.store');    // For storing customer
    Route::get('/edit/{id}', [CustomerDetailController::class, 'edit'])->name('customer.edit');    // For editing customer
    Route::delete('/destroy/{id}', [CustomerDetailController::class, 'destroy'])->name('customer.destroy');  // For deleting customer
});



Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::get('a', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});



