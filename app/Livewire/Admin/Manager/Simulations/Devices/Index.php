<?php

namespace App\Livewire\Admin\Manager\Simulations\Devices;

use Livewire\Component;
use App\Models\Breakdown;
use Livewire\WithPagination;
use App\Services\notificationService;

class Index extends Component
{
    use WithPagination;

    public function deleteBreakdown($id)
    {
        $notificationService = new notificationService();
        $breakdown = Breakdown::findOrFail($id);
        if ($breakdown->delete())
        {
            $notificationService->notify('success', "O registro '" .  $breakdown->name . "' foi deletado com sucesso!");
        } else {
            $notificationService->notify('error', "O registro '" . $breakdown->name . "' não foi deletado!");
        }

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
