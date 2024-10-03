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
    public string $bought_value = '';
    public string $image;
    public $description;

    public function createProduct()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'bought_value' => 'required',
            'image' => 'required',
        ]);

        Products::create([
            'name' => $this->name,
            'category_id' => $this->category,
            'price' => $this->price,
            'description' => $this->description,
            'bought_value' => $this->bought_value,
            'image_url' => $this->image,
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