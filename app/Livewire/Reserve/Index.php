<?php

namespace App\Livewire\Reserve;

use Livewire\Component;
use App\Models\Reserve;
use App\Models\Products;
use App\Http\Controllers\telegramController;

class Index extends Component
{
    public $product;
    public $name;
    public $email;
    public $number;
    public $cpf;
    public $address;
    public $product_name;
    public $price;
    public $payment_method;
    public $installments;
    public $view;

    public function mount($id)
    {
        $this->product = Products::findOrFail($id);
        $product_name = $this->product->name;
        $price = $this->product->price;
        $this->view = 0;
    }

    public function createReserve()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'cpf' => 'required',
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        Reserve::create([
            'name' => $this->name,
            'email' => $this->email,
            'number' => $this->number,
            'cpf' => $this->cpf,
            'address' => $this->address,
            'product_name' => $this->product->name,
            'price' => $this->product->price,
            'payment_method' => ($this->payment_method == 'Cartão de Crédito') 
                                    ? $this->payment_method . ' (' . $this->installments . 'x)' 
                                    : $this->payment_method,
            'product_id' => $this->product->id,
        ]);

        $this->product->is_reserved = true;
        $this->product->save();

        telegramController::message("🛒 Nova reserva criada! Produto: " . $this->product->name);
                
        $this->view = 1;
        
        return;
    }

    public function render()
    {
        return view('livewire.reserve.index')->layout('components.layouts.wapp');
    }
}
