<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Repositories\UserRepository;

class Register extends Component
{
    public $name, $email,$password,$password_confirmation;
    
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|string|min:6',
    ];
    public function register( UserRepository $userRepository){
        $this->validate();

        $userRepository->insertUser([
            'name' =>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
        ]);

        session()->flash('message', 'User registered successfully!');

        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.user.register');
    }
}
