<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class View extends Component
{
    public $product;
    public $hasImageFolder = false; // Add a property to store the result
    public $pngImageCount; // Add a property to store the count of .png images

    public $hasImageFolder2 = false; // Add a property to store the result
    public $pngImageCount2; // Add a property to store the count of .png images

    public function mount($id)
    {
        $this->product = Products::findOrFail($id); 
    
        if ($this->product->is_reserved != null)
        {
            redirect()->route('Products');
        }

        // Check if the image folder exists
        $imageFolderPath = 'img/products/'. $this->product->id;
        $this->hasImageFolder = Storage::exists($imageFolderPath);
        $this->pngImageCount = count(glob($imageFolderPath . '/' . "*.{jpg,png,gif}",GLOB_BRACE));
        
        // Check if the image folder exists 2
        $imageFolderPath2 = 'img/photos/'. $this->product->id;
        $this->hasImageFolder2 = Storage::exists($imageFolderPath2);
        $this->pngImageCount2 = count(glob($imageFolderPath2 . '/' . "*.{jpg,png,gif}",GLOB_BRACE));
        
    }

    public function render()
    {
        return view('livewire.products.view', [
            'hasImageFolder' => $this->hasImageFolder,
            'pngImageCount' => $this->pngImageCount, // Pass the count to the view
            'pngImageCount2' => $this->pngImageCount2,
        ]);
    }
}