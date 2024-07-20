<?php

use Illuminate\Routing\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class,'login']);

    Route::middleware('auth:api')->group( function() {
        Route::resource('products', ProductController::class);
    });