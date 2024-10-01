<?php

namespace App\Livewire\Admin\Manager\Users;

use Livewire\Component;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    public function createUser()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        User::create(array(
            'name'     => $this->name,
            'password' => Hash::make($this->password),
            'email'    => $this->email,
            'role'     => $this->role,
        ));
        $notificationService->notify("success", "Usuário registrado com sucesso!");

        redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.admin.manager.users.create')->layout('components.layouts.admin');
    }
}
