<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sactum')->get('/user',function (Request $request){
    return $request->user();
});

Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);

Route::middleware('auth:api')->group(function(){
    Route::post('/logout',[AuthenticationController::class,'logout']);
    Route::resource('products',ProductController::class);
});