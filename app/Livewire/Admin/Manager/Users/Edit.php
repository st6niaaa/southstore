<?php

namespace App\Livewire\Admin\Manager\Users;

use Livewire\Component;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $user;
    public $name;
    public $email;
    public $role;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
    }

    public function updateUser()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'name' => ['required'],
            'email' => ['required'],
            'role' => ['required'],
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->role = $this->role;

        if ($this->user->save())
        {
            $notificationService->notify("success", "Usuário '" . $this->name . "' editado com sucesso!");
        } else {
            $notificationService->notify("error", "O usuário não foi editado!");
        }

        redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.admin.manager.users.edit')->layout('components.layouts.admin');
    }
}
