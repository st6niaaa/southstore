<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customers;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public function render()
    {
        $customers = Customers::paginate(10);

        return view('livewire.admin.customers.index', [
            'customers' => $customers,
        ])->layout('components.layouts.admin');
    }
}
