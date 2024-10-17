<?php

namespace App\Livewire\Admin\Manager\Simulations\Devices;

use Livewire\Component;
use App\Models\Breakdown;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function deleteBreakdown($id)
    {
        $breakdown = Breakdown::findOrFail($id);
        $breakdown->delete();

        redirect()->route('manager.simulations.device');
    }

    public function render()
    {
        $breakdowns = Breakdown::latest()->paginate(10);
        return view('livewire.admin.manager.simulations.devices.index', [
            'breakdowns' => $breakdowns,
        ])->layout('components.layouts.admin');
    }
}
