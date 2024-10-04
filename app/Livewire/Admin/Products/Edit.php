<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;
use App\Models\categorys;
use App\Services\NotificationService;

class Edit extends Component
{
    public $product;
    public $name;
    public $category;
    public $price;
    public $description;
    public $bought_value;
    public $imei;
    public $image;

    public function mount(string|int $id)
    {
        $this->product = Products::findOrFail($id);
        $this->name = $this->product->name;
        $this->category = $this->product->category_id;
        $this->price = $this->product->price;
        $this->bought_value = $this->product->bought_value;
        $this->imei = $this->product->imei;
        $this->description = $this->product->description;
        $this->image = $this->product->image_url;
    }

    public function editProduct()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'bought_value' => 'required',
            'description' => 'required',
            'imei' => 'required',
            'image' => 'required',
        ]);

        $product = Products::find($this->product->id);
        $product->name = $this->name;
        $product->category_id = $this->category;
        $product->price = $this->price;
        $product->bought_value = $this->bought_value;
        $product->imei = $this->imei;
        $product->description = $this->description;
        $product->image_url = $this->image;
        if ($product->save()) {
            $notificationService->notify("success", "Produto '" . $this->name . "' editado com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Ocorreu um erro ao editar o produto '" . $this->name . "'.", 3000);
        }

        redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = categorys::all();
        return view('livewire.admin.products.edit', [
            'categories' => $categories,
        ])->layout('components.layouts.admin');
    }
}
