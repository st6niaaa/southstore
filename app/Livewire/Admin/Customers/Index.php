<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customers;
use Livewire\WithPagination;
use App\Services\notificationService;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteCustomer($id)
    {
        $notificationService = new notificationService();
        $customer = Customers::findOrFail($id);
        if ($customer->delete())
        {
            $notificationService->notify('success', 'Cliente deletado com sucesso!');
        } else {
            $notificationService->notify('success', 'Cliente não deletado!');
        }

        redirect()->route('customers');
    }
    
    public function render()
    {
        $customers = Customers::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('number', 'like', '%' . $this->search . '%')
                  ->orWhere('cpf', 'like', '%' . $this->search . '%')
                  ->orWhere('address', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10);

        return view('livewire.admin.customers.index', [
            'customers' => $customers,
        ])->layout('components.layouts.admin');
    }
}
