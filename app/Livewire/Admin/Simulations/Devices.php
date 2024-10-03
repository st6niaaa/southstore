<?php

namespace App\Livewire\Admin\Simulations;

use Livewire\Component;

class Devices extends Component
{
    public function render()
    {
        return view('livewire.admin.simulations.devices')->layout('components.layouts.admin');
    }
}
