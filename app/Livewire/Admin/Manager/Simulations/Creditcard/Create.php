<?php

namespace App\Livewire\Admin\Manager\Simulations\Creditcard;

use Livewire\Component;
use App\Models\Simulations;
use App\Services\notificationService;

class Create extends Component
{
    public $rate_name;
    public $percentagerate;

    public function createRate()
    {
        $notificationService = new NotificationService;
        $this->validate([
            'rate_name' => "required",
            'percentagerate' => "required",
        ]);

        Simulations::create([
            'rate_name' => $this->rate_name,
            'percentagerate' => $this->percentagerate,
        ]);

        $notificationService->notify('success', "Taxa criada com sucesso");
        
        redirect()->route('manager.simulations.credit');
    }

    public function render()
    {
        return view('livewire.admin.manager.simulations.creditcard.create')->layout('components.layouts.admin');
    }
}
