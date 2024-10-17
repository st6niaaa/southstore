<?php

namespace App\Livewire\Admin\Manager\Simulations\Creditcard;

use Livewire\Component;
use App\Models\Simulations;

class Create extends Component
{
    public $rate_name;
    public $percentagerate;

    public function createRate()
    {
        $this->validate([
            'rate_name' => "required",
            'percentagerate' => "required",
        ]);

        Simulations::create([
            'rate_name' => $this->rate_name,
            'percentagerate' => $this->percentagerate,
        ]);
        
        redirect()->route('manager.simulations.credit');
    }

    public function render()
    {
        return view('livewire.admin.manager.simulations.creditcard.create')->layout('components.layouts.admin');
    }
}
