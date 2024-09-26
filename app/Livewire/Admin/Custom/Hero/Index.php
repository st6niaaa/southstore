<?php

namespace App\Livewire\Admin\Custom\Hero;

use Livewire\Component;
use App\Models\Hero;
use App\Services\NotificationService;

class Index extends Component
{
    public function deleteHero($id)
    {
        $notificationService = new NotificationService();
        $hero = Hero::findOrFail($id);
        if ($hero->delete()) {
            $notificationService->notify("success", "Hero deletada com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Ocorreu um erro ao tentar excluir a hero!", 3000);
        }
        redirect()->route('hero');
    }

    public function render()
    {
        $heros = Hero::paginate(10);
        return view('livewire.admin.custom.hero.index', [
            'heros' => $heros,
        ])->layout('components.layouts.admin');
    }
}
