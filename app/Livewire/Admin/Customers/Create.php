<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customers;

class Create extends Component
{
    public $name;
    public $email;
    public $number;
    public $cpf;
    public $address;

    public function createCustomer()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'cpf' => 'required',
            'address' => 'required',
        ]);

        Customers::create([
            'name' => $this->name,
            'email' => $this->email,
            'number' => $this->number,
            'cpf' => $this->cpf,
            'address' => $this->address,
        ]);

        redirect()->route('customers');
    }
    
    public function render()
    {
        return view('livewire.admin.customers.create')->layout('components.layouts.admin');
    }
}
