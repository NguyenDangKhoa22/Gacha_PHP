<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $name;
    public $password;
    public $rules = [
        'name' => 'required',
        'password' => 'required'
    ];
    public function login(UserRepository $userRepository){
        $this->validate();
        if($userRepository->checkUser($this->name,$this->password) == true){
            session()->flash('message', 'User login successfull');
            return redirect()->route('home');
        }
        else{
            session()->flash('message', 'User login fail');
        return redirect()->route('404');
        }
        

    }
    public function render()
    {
        return view('livewire.user.login');
    }
}
