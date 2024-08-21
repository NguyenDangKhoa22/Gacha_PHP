<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterUser extends Component
{
    public $name;
    public $password;
    protected $rules = [
        "name" => 'required',
        "password" => 'required|min:6',
    ];
    public function submit(){
        $this ->validate();
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.register-user');
    }
}
