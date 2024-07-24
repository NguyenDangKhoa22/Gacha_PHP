<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

//open Routes
Route::post("register",[ApiController::class, "register"]);
Route::post("login",[ApiController::class, "register"]);

//protected Routes

Route::group([
    "middleware" => ["auth:api"]
], function(){
    Route::get("profile", [ApiController::class],"profile");
    Route::get("logout", [ApiController::class],"logout");
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
