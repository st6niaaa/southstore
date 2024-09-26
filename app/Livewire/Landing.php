<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hero;

class Landing extends Component
{
    public $heroes;

    public function mount() 
    {
        $this->heroes = Hero::all();
    }

    public function render()
    {
        return view('livewire.landing');
    }
}
