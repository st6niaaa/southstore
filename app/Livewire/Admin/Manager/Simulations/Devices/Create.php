<?php

namespace App\Livewire\Admin\Manager\Simulations\Devices;

use Livewire\Component;
use App\Models\Breakdown;
use App\Services\notificationService;

class Create extends Component
{
    public $name;
    public $description;
    public $price;

    public function createBreakdown()
    {
        $notificationService = new notificationService();
        $this->validate([
            'name' => "required",
            'description' => "required",
            'price' => "required",
        ]);

        Breakdown::create([
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->price,
        ]);

        $notificationService->notify('success', "A imperfeição foi criada com sucesso!");

        redirect()->route('manager.simulations.device');
    }

    public function render()
    {
        return view('livewire.admin.manager.simulations.devices.create')->layout('components.layouts.admin');
    }
}
