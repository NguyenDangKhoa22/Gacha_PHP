<?php

use App\Livewire\Check;
use App\Livewire\Home;
use App\Livewire\User\Register;
use App\Livewire\User\Login;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/404', function(){
    return view('404');
})->name('404');
Route::get('/register', Register::class)->name('register');
Route::get('/home', Home::class)->name('home');
Route::get('/check', Check::class);
Route::get('/login', Login::class)->name('login');