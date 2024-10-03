<?php

namespace App\Livewire\Admin\Simulations;

use Livewire\Component;
use App\Models\Simulations;

class Creditcard extends Component
{
    public $iscalculated;
    public $ratevalue;
    public $totalvalue;
    public $percentage;
    public $payvalue;

    public function calculateRate()
    {
        $this->validate([
            'percentage' => "required",
            'payvalue' => "required",
        ]);

        $this->ratevalue = ($this->payvalue * $this->percentage) / 100;
        $this->totalvalue = $this->ratevalue + $this->payvalue;
        $this->iscalculated = true;
        return;
    }

    public function render()
    {
        $simulations = Simulations::all();
        return view('livewire.admin.simulations.creditcard', [
            'simulations' => $simulations,
        ])->layout('components.layouts.admin');
    }
}
