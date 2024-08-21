<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RegisterUser;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', RegisterUser::class);