<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Products;

class View extends Component
{
    public $product;
    
    public function mount($id)
    {
        $this->product = Products::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.products.view');
    }
}
