<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class View extends Component
{
    public $product;
    public $hasImageFolder = false; // Add a property to store the result
    
    public function mount($id)
    {
        $this->product = Products::findOrFail($id); 
        
        // Check if the image folder exists
        $imageFolderPath = 'img/products/' . $this->product->id;
        $this->hasImageFolder = Storage::exists($imageFolderPath); 
    }

    public function render()
    {
        return view('livewire.products.view', [
            'hasImageFolder' => $this->hasImageFolder,
        ]);
    }
}
