<?php

namespace App\Livewire\Admin\Manager\Simulations\Creditcard;

use Livewire\Component;
use App\Models\Simulations;
use App\Services\notificationService;

class Edit extends Component
{
    public $rate;
    public $rate_name;
    public $percentagerate;

    public function mount($id)
    {
        $this->rate = Simulations::findOrFail($id);
        $this->rate_name = $this->rate->rate_name;
        $this->percentagerate = $this->rate->percentagerate;
    }

    public function updateRate()
    {
        $notificationService = new notificationService();
        $this->validate([
            'rate_name' => "required",
            'percentagerate' => "required",
        ]);

        $this->rate->rate_name = $this->rate_name;
        $this->rate->percentagerate = $this->percentagerate;
        if ($this->rate->save())
        {
            $notificationService->notify('success', "A taxa '" . $this->rate_name . "' foi editada com sucesso!");
        } else {
            $notificationService->notify('error', "A taxa '" . $this->rate_name . "' não foi editada!");
        }

        redirect()->route('manager.simulations.credit');
    }
    
    public function render()
    {
        return view('livewire.admin.manager.simulations.creditcard.edit')->layout('components.layouts.admin');
    }
}
