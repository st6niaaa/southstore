<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customers;
use Livewire\WithPagination;
use App\Services\notificationService;

class Index extends Component
{
    use WithPagination;

    public function deleteCustomer($id)
    {
        $notificationService = new notificationService;
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
        $customers = Customers::latest()->paginate(10);

        return view('livewire.admin.customers.index', [
            'customers' => $customers,
        ])->layout('components.layouts.admin');
    }
}
