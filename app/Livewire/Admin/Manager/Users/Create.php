<?php

namespace App\Livewire\Admin\Manager\Users;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.manager.users.create')->layout('components.layouts.admin');
    }
}
