<?php

namespace App\Livewire\Admin\Manager\Simulations\Devices;

use Livewire\Component;
use App\Models\Breakdown;

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
        $this->validate([
            'name' => "required",
            'description' => "required",
            'price' => "required",
        ]);
        
        $this->device->name = $this->name;
        $this->device->description = $this->description;
        $this->device->value = $this->price;
        
        $this->device->save();

        redirect()->route('manager.simulations.device');
    }

    public function render()
    {
        return view('livewire.admin.manager.simulations.devices.edit')->layout('components.layouts.admin');
    }
}
