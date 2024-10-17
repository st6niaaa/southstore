<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hero;
use App\Models\Review;
use App\Models\Products;

class Landing extends Component
{
    public $heroes;

    public function mount() 
    {
        $this->heroes = Hero::all();
    }

    public function render()
    {
        $reviews = Review::latest()->take(4)->get()->whereNotNull('reviewer_grade');
        $products = Products::latest()->take(4)->whereNull('is_reserved')->get();
        return view('livewire.landing', [
            'reviews' => $reviews,
            'products' => $products,
        ]);
    }
}
