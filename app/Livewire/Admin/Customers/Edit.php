<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customers;

class Edit extends Component
{
    public $customer;
    public $name;
    public $email;
    public $number;
    public $cpf;
    public $address;

    public function mount($id)
    {
        $this->customer = Customers::findOrFail($id);
        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->number = $this->customer->number;
        $this->cpf = $this->customer->cpf;
        $this->address = $this->customer->address;
    }

    public function updateCustomer()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'cpf' => 'required',
            'address' => 'required',
        ]);

        $this->customer->name = $this->name;
        $this->customer->email = $this->email;
        $this->customer->number = $this->number;
        $this->customer->cpf = $this->cpf;
        $this->customer->address = $this->address;
        $this->customer->save();

        redirect()->route('customers');
    }
    
    public function render()
    {
        return view('livewire.admin.customers.edit')->layout('components.layouts.admin');
    }
}
