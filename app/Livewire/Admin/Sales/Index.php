<?php

namespace App\Livewire\Admin\Sales;

use Livewire\Component;
use App\Models\Sales;
use App\Services\NotificationService;
use Livewire\WithPagination; 

class Index extends Component
{
    use WithPagination;

    public function deleteSale($id)
    {
        $notificationService = new NotificationService();
        if (Sales::find($id)->delete()) {
            $notificationService->notify("success", "Venda excluída com sucesso!", 3000);
        }
        redirect()->route('sales');
    }

    public function render()
    {
        $sales = Sales::paginate(10);
        return view('livewire.admin.sales.index', [
            'sales' => $sales,
        ])->layout('components.layouts.admin');
    }
}