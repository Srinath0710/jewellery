<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDetailController;


Route::group(['prefix' => 'customer'], function () {
    Route::get('/index', [CustomerDetailController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerDetailController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerDetailController::class, 'store'])->name('customer.store');

    Route::get('/edit/{id}', [CustomerDetailController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{id}', [CustomerDetailController::class, 'update'])->name('customer.update');
    Route::delete('/destroy/{id}', [CustomerDetailController::class, 'destroy'])->name('customer.destroy');  
});


Route::get('', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});



