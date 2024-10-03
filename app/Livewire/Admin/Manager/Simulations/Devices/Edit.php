<?php

namespace App\Livewire\Admin\Manager\Simulations\Devices;

use Livewire\Component;
use App\Models\Breakdown;
use App\Services\notificationService;

class Edit extends Component
{
    public $device;
    public $name;
    public $description;
    public $price;

    public function mount($id)
    {
        $this->device = Breakdown::findOrFail($id);
        $this->name = $this->device->name;
        $this->description = $this->device->description;
        $this->price = $this->device->value;
    }

    public function updateBreakdown()
    {
        $notificationService = new notificationService();
        $this->validate([
            'name' => "required",
            'description' => "required",
            'price' => "required",
        ]);
        
        $this->device->name = $this->name;
        $this->device->description = $this->description;
        $this->device->value = $this->price;
        
        if ($this->device->save())
        {
            $notificationService->notify('success', "A imperfeição '". $this->name . "' foi editada com sucesso");
        } else {
            $notificationService->notify('success', "A imperfeição '" . $this->name . "' não foi editada!");
        }

        redirect()->route('manager.simulations.device');
    }

    public function render()
    {
        return view('livewire.admin.manager.simulations.devices.edit')->layout('components.layouts.admin');
    }
}
