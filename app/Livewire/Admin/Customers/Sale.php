<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Sales;
use App\Services\notificationService;

class Sale extends Component
{
    public $customer;
    public $idproduct;
    public $paymentmethod;
    public $installments;
    public $istodelete;

    public function mount($id)
    {
        $this->customer = Customers::findOrFail($id);
    }

    public function createSale()
    {
        $notificationService = new notificationService();

        $this->validate([
            'idproduct' => 'required',
            'paymentmethod' => 'required',
            'installments' => 'required',
        ]);

        $product = Products::find($this->idproduct);
        if (!$product)
        {
            $notificationService->notify('error', "O produto informado não foi localizado!");
            redirect()->route('customers');
        } else {
            Sales::create([
                'name' => $this->customer->name,
                'email' => $this->customer->email,
                'number' => $this->customer->number,
                'cpf' => $this->customer->cpf,
                'address' => $this->customer->address,
                'product_name' => $product->name,
                'price' => $product->price,
                'payment_method' => $this->paymentmethod,
                'installments' => $this->installments,
            ]);

            if ($this->istodelete)
            {
                if (!$product->delete())
                {
                    $notificationService->notify('error', "Não foi possível excluir o produto.");
                    redirect()->route('customers');
                }
            }

            $notificationService->notify('success', "A venda foi realizada com sucesso!");
            redirect()->route('customers');

        }
    }

    public function render()
    {
        return view('livewire.admin.customers.sale')->layout('components.layouts.admin');
    }
}
