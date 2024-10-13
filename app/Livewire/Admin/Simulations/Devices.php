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
            'selectedItems' => "required|array", // Ensure it's an array of IDs
            'payvalue' => "required|numeric", 
        ]);
    
        $this->sum = 0; 
    
        foreach ($this->selectedItems as $itemId) {
            $breakdown = Breakdown::findOrFail($itemId); 
            $this->sum += $breakdown->value; 
        }
    
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
