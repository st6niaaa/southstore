<?php

namespace App\Livewire\Admin\Simulations;

use Livewire\Component;
use App\Models\Breakdown;

class Devices extends Component
{
    public $selectedItems = [];
    public $sum = 0;
    public $payvalue;
    public $finalpayvalue;

    public function calculateDevice()
    {
        $this->validate([
            'selectedItems' => "required",
            'payvalue' => "required",
        ]);
        $this->sum = array_sum($this->selectedItems);

        $this->finalpayvalue = $this->payvalue - $this->sum;
        return;
    }

    public function render()
    {
        $breakdowns = Breakdown::all();
        return view('livewire.admin.simulations.devices', [
            'breakdowns' => $breakdowns,
        ])->layout('components.layouts.admin');
    }
}
