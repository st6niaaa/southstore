<?php

namespace App\Livewire\Admin\Manager\Simulations\Creditcard;

use Livewire\Component;
use App\Models\Simulations;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function deleteRate($id)
    {
        $rate = Simulations::findOrFail($id);
        $rate->delete();

        redirect()->route('manager.simulations.credit');
    }

    public function render()
    {
        $simulations = Simulations::latest()->paginate(10);
        
        return view('livewire.admin.manager.simulations.creditcard.index', [
            'simulations' => $simulations,
        ])->layout('components.layouts.admin');
    }
}
