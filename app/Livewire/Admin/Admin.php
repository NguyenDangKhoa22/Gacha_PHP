<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Repositories\UserRepository;

class Admin extends Component
{
    public $listUser;
    public $text;
    public function mount() {
        $user_repo = new UserRepository;
        $this->listUser = $user_repo->getUser();
    }
    public function render()
    {
        return view('livewire.admin.admin',);
    }
}
