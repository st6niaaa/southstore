<?php

namespace App\Livewire\Admin\Custom\Qs;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.custom.qs.index')->layout('components.layouts.admin');
    }
}
