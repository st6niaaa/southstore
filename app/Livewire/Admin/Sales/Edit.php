<?php

namespace App\Livewire\Admin\Sales;

use Livewire\Component;
use App\Services\NotificationService;
use App\Models\Sales;

class Edit extends Component
{
    public $sale;
    public $name;
    public $email;
    public $number;
    public $cpf;
    public $address;
    public $paymentmethod;
    public $istodelete;
    public $installments;

    public function mount(string|int $id)
    {
        $this->sale = Sales::findOrFail($id);
        $this->name = $this->sale->name;
        $this->email = $this->sale->email;
        $this->number = $this->sale->number;
        $this->cpf = $this->sale->cpf;
        $this->address = $this->sale->address;
        $this->paymentmethod = $this->sale->payment_method;
    }

    public function updateSale()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required', 'email:rfc,dns'],
            'number' => ['required','string','max:255'],
            'cpf' => ['required','string','max:14'],
            'address' => ['required','string','max:255'],
            'paymentmethod' => ['required','string','max:255'],
        ]);

        $this->sale->name = $this->name;
        $this->sale->email = $this->email;
        $this->sale->number = $this->number;
        $this->sale->cpf = $this->cpf;
        $this->sale->address = $this->address;
        $this->sale->payment_method = $this->paymentmethod;
        if ($this->sale->save()) {
            $notificationService->notify("success", "Venda editada com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Falha ao editar a venda!", 3000);
        }
        redirect()->route('sales');
    }

    public function render()
    {
        return view('livewire.admin.sales.edit')->layout('components.layouts.admin');
    }
}
