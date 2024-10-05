<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hero;
use App\Models\Review;

class Landing extends Component
{
    public $heroes;

    public function mount() 
    {
        $this->heroes = Hero::all();
    }

    public function render()
    {
        $reviews = Review::latest()->take(4)->get();
        return view('livewire.landing', [
            'reviews' => $reviews,
        ]);
    }
}
