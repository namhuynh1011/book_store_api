<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderAdController;


Route::prefix('')->group(function () {
    Route::resources(['categories' => CategoryController::class]);
    Route::resources(['products' => ProductController::class]);
    Route::post('/order', [OrderController::class, 'create']);
    Route::get('/orders/{id}/details', [OrderController::class, 'getOrderDetails']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('order', OrderAdController::class);
});
