<?php

namespace App\Livewire\Admin\Custom\Hero;

use Livewire\Component;
use App\Models\Hero;
use App\Services\NotificationService;

class Edit extends Component
{
    public $hero;
    public $image;

    public function mount($id)
    {
        $this->hero = Hero::findOrFail($id);
        $this->image = $this->hero->image_url;
    }

    public function updateHero()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'image' => 'required',
        ]);

        $this->hero->image_url = $this->image;
        if ($this->hero->save())
        {
            $notificationService->notify("success", "Hero editada com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Ocorreu um erro ao editar o hero!", 3000);
        }

        return redirect()->route('hero');
    }

    public function render()
    {
        return view('livewire.admin.custom.hero.edit')->layout('components.layouts.admin');
    }
}
