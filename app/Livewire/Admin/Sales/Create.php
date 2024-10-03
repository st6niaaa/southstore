<?php

namespace App\Livewire\Admin\Sales;

use Livewire\Component;
use App\Models\Products;
use App\Models\Sales;
use App\Models\Customers;
use App\Services\NotificationService;

class Create extends Component
{
    public $product;
    public $name;
    public $email;
    public $number;
    public $cpf;
    public $address;
    public $paymentmethod;
    public $istoregister;
    public $istodelete;
    public $installments;

    public function mount($id)
    {
        $this->product = Products::findOrFail($id);
        $this->istoregister = true;
    }

    public function registerSale()
    {
        $notificationService = new NotificationService();

        $sale = Sales::create([
            'name' => $this->name,
            'email' => $this->email,
            'number' => $this->number,
            'cpf' => $this->cpf,
            'address' => $this->address,
            'product_name' => $this->product->name,
            'price' => $this->product->price,
            'payment_method' => $this->paymentmethod,
            'installments' => $this->installments,
        ]);

        // check if to delete the product
        if ($this->istodelete) {
            $this->product->delete();
        }

        if ($this->istoregister) {
            Customers::create([
                'name' => $this->name,
                'email' => $this->email,
                'number' => $this->number,
                'cpf' => $this->cpf,
                'address' => $this->address,
            ]);
        }
        
        $notificationService->notify("success", "Venda registrada com sucesso!", 3000);
        redirect()->route('sales');
    }

    public function render()
    {
        return view('livewire.admin.sales.create', [
            'product' => $this->product,
        ])->layout('components.layouts.admin');
    }
}
