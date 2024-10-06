<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\UserRepository;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $userRepository;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct(); // Gọi parent constructor
        $this->userRepository = $userRepository;
    }

    public function register()
    {
        $this->validate();

        $input = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ];

        // Gọi phương thức addUser từ userRepository
        $this->userRepository->addUser($input);
        
        session()->flash('message', 'User registered successfully.');

        // Reset các trường sau khi tạo người dùng thành công
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
    }
    
    public function render()
    {
        return view('livewire.register');
    }
}
