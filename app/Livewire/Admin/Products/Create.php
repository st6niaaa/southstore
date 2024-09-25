<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products; 
use App\Models\Categorys;

class Create extends Component
{
    public string $name = '';
    public string $category = '';
    public string $price = '';
    public $description;

    public function createProduct()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        Products::create([
            'name' => $this->name,
            'category_id' => $this->category,
            'price' => $this->price,
            'description' => $this->description,
        ]);

        redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Categorys::all();

        return view('livewire.admin.products.create', [
            'categories' => $categories,
            'description' => $this->description,
        ])->layout('components.layouts.admin');
    }
}