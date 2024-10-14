<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;
use App\Services\NotificationService;

class Photos extends Component
{
    public $product;
    public $name;

    public function mount(string|int $id)
    {
        $notificationService = new notificationService();
        $this->product = Products::findOrFail($id);

        $imageFolderPath = 'img/products/'. $id;
        if (file_exists($imageFolderPath . '/'))
        {
            $notificationService->notify('error', "Já existe um 3D aplicado a este produto.");
            redirect()->route('admin.products');
        }

        $this->name = $this->product->name;
    }
    
    private function deleteDirectoryRecursively($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!$this->deleteDirectoryRecursively($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
    
        }
    
        return rmdir($dir);
    }

    public function removePhotos()
    {
        $notificationService = new NotificationService();
        $productFolderPath = 'img/photos/' . $this->product->id;
    
        if (file_exists(public_path($productFolderPath))) {
            $this->deleteDirectoryRecursively(public_path($productFolderPath)); 
    
            $notificationService->notify("success", "As fotos do produto '". $this->product->name ."' foram removidas com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Nenhuma foto encontrada para este produto.", 3000);
        }
    
        redirect()->route('admin.products', $this->product->id);
    }

    public function render()
    {
        return view('livewire.admin.products.photos', [
            'productid' => $this->product->id,
            'product' => $this->product,
            'name' => $this->name,
        ])->layout('components.layouts.admin');
    }
}
