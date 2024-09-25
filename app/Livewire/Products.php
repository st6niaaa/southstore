<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\categorys;
use App\Models\Products as Product;

class Products extends Component
{
    public function render()
    {
        $categories = categorys::all();
        $products = Product::all();
        return view('livewire.products', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
