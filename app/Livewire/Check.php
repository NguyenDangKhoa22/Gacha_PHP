<?php

namespace App\Livewire;

use Livewire\Component;

class Check extends Component
{   
    public $title;
    public function push(){
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.check');
    }
}
