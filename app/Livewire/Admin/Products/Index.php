<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;
use App\Services\NotificationService;
use Livewire\WithPagination; 

class Index extends Component
{
    use WithPagination; // Apply the trait

    public $search = '';

    public function deleteProduct($id)
    {
        $notificationService = new NotificationService();
        if ($product = Products::FindOrFail($id))
        {
            if ($product->delete())
            {
                $notificationService->notify("success", "O produto '" . $product->name . "' foi excluído com sucesso!", 3000);
            }
            
        } else {
            $notificationService->notify("error", "O produto não pôde ser encontrado!", 3000);
        }
        redirect()->route('admin.products');
    }

    public function render()
    {
        $products = Products::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('imei', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10);
        
        return view('livewire.admin.products.index', [
            'products' => $products,
            'search' => $this->search,
        ])->layout('components.layouts.admin');
    }
}
