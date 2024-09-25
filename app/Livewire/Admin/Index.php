<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Index extends Component
{
    public function render()
    {
        $currentTime = Carbon::now('America/Sao_Paulo');
        $hour = $currentTime->hour;

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
