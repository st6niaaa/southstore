<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;

class Threedview extends Component
{
    public $product;
    public $name;

    public function mount(string|int $id)
    {
        $this->product = Products::findOrFail($id);
        $this->name = $this->product->name;
    }
    
    public function render()
    {
        return view('livewire.admin.products.threedview', [
            'productid' => $this->product->id,
            'product' => $this->product,
            'name' => $this->name,
        ])->layout('components.layouts.admin');
    }
}
