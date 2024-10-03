<?php

namespace App\Livewire\Admin\Manager\Simulations\Creditcard;

use Livewire\Component;
use App\Models\Simulations;
use Livewire\WithPagination;
use App\Services\notificationService;

class Index extends Component
{
    use WithPagination;

    public function deleteRate($id)
    {
        $notificationService = new notificationService;
        $rate = Simulations::findOrFail($id);
        if ($rate->delete())
        {
            $notificationService->notify('success', "Taxa '" . $rate->rate_name . "' deletada com sucesso!");
        } else {
            $notificationService->notify('error', "A taxa '" . $rate->rate_name  . "' não foi deletada");
        }

        redirect()->route('manager.simulations.credit');
    }

    public function render()
    {
        $simulations = Simulations::paginate(10);
        
        return view('livewire.admin.manager.simulations.creditcard.index', [
            'simulations' => $simulations,
        ])->layout('components.layouts.admin');
    }
}
