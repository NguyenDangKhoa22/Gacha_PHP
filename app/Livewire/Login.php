<?php

namespace App\Livewire;

use App\Models\User;
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
    public function login(){
        $this->validate();
        $user = User::where('name',$this->name)->first();
        if(!$user){
            $this->addError('name',"khung");
        }
        else{
            if(Hash::check($this->password,$user->password)){
                return redirect()->route('404');
            }
            $this->addError('password',"dien");
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
