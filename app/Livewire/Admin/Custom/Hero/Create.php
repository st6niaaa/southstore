<?php

namespace App\Livewire\Admin\Custom\Hero;

use Livewire\Component;
use App\Models\Hero;
use App\Services\NotificationService;

class Create extends Component
{
    public $hero;
    public $image = '';

    public function createHero()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'image' => ['required'],
        ]);

        $hero = new Hero();
        $hero->image_url = $this->image;
        if ($hero->save()) {
            $notificationService->notify("success", "Nova hero adicionada com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Ocorreu um erro ao adicionar a hero.", 3000);
        }

        return redirect()->route('hero');
    }
    
    public function render()
    {
        return view('livewire.admin.custom.hero.create')->layout('components.layouts.admin');
    }
}
