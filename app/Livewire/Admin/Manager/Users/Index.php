<?php

namespace App\Livewire\Admin\Manager\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Services\NotificationService;

class Index extends Component
{
    use WithPagination;

    public function deleteUser($id)
    {
        $notificationService = new NotificationService();
        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            $notificationService->notify("error", "Você não pode deletar seu próprio usuário!");
        } else {
            if ($user->delete()) {
                $notificationService->notify("success", "Usuário deletado com sucesso!");
            } else {
                $notificationService->notify("error", "Não foi possível deletar o usuário!");
            }
        }
        
        redirect()->route('users');
    }

    public function blockUser($id)
    {
        $notificationService = new NotificationService();
        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            $notificationService->notify("error", "Você não pode bloquear seu próprio usuário!");
        } else {
            if ($user->role == 'Blocked') {
                $user->role = 'Active';
                if ($user->save()) {
                    $notificationService->notify("success", "Usuário desbloqueado com sucesso!");
                }
            } else {
                $user->role = 'Blocked';
                if ($user->save()) {
                    $notificationService->notify("success", "Usuário bloqueado com sucesso!");
                }
            }
        }
        
        redirect()->route('users');
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.manager.users.index', [
            'users' => $users,
        ])->layout('components.layouts.admin');
    }
}
