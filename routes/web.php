<?php

use App\Livewire\Check;
use App\Livewire\Home;
use App\Livewire\User\Register;
use App\Livewire\User\Login as loginUser;
use App\Livewire\Admin\Login as loginAdmin;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Admin as adminHome;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/404', function(){
    return view('404');
})->name('404');
Route::get('/user/register', Register::class)->name('register');
Route::get('/home', Home::class)->name('home');
Route::get('/check', Check::class);
Route::get('/user/login', loginUser::class)->name('login');
Route::get('/admin/login',loginAdmin::class)->name('login');
Route::get('/admin',adminHome::class)->name('admin');