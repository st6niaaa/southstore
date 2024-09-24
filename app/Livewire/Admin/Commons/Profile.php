<?php

namespace App\Livewire\Admin\Commons;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public string $name;
    public string $email;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function userEdit()
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        
        redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.admin.commons.profile')->layout('components.layouts.admin');
    }
}
