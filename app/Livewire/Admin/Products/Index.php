<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;

class Index extends Component
{
    public function render()
    {
        $products = Products::paginate(10);
        return view('livewire.admin.products.index', [
            'products' => $products,
        ])->layout('components.layouts.admin');
    }
}
