<?php

use App\Livewire\Check;
use App\Livewire\Home;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/404', function(){
    return view('404');
});
Route::get('/register', Register::class);
Route::get('/home', Home::class)->name('home');
Route::get('/check', Check::class);