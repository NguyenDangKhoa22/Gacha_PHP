<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $name;
    public $password;
    public $rules = [
        'name' => 'required',
        'password' => 'required'
    ];
    public function login(){

    }
    public function render()
    {
        return view('livewire.login');
    }
}
