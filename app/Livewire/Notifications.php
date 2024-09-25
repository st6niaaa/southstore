<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Notifications extends Component
{
    public $notification;
    public $statusicon;
    public $statuscolor;

    public function mount()
    {
        $this->notification = session('notification');

    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
