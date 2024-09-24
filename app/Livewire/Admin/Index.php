<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Index extends Component
{
    public function render()
    {
        // Get the current time in Brazil timezone
        $currentTime = Carbon::now('America/Sao_Paulo');

        // Get the hour of the day
        $hour = $currentTime->hour;

        // Determine the greeting based on the hour
        if ($hour >= 0 && $hour < 12) {
            $greeting = "Bom dia";
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = "Boa tarde";
        } else {
            $greeting = "Boa noite";
        }

        return view('livewire.admin.index', [
            'greeting' => $greeting,
        ])->layout('components.layouts.admin');
    }
}
