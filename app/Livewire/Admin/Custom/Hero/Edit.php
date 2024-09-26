<?php

namespace App\Livewire\Admin\Custom\Hero;

use Livewire\Component;
use App\Models\Hero;
use App\Services\NotificationService;

class Edit extends Component
{
    public $hero;
    public $title;
    public $description;
    public $image;

    public function mount($id)
    {
        $this->hero = Hero::findOrFail($id);
        $this->title = $this->hero->title;
        $this->description = $this->hero->description;
        $this->image = $this->hero->image_url;
    }

    public function updateHero()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'title' =>'required|max:255',
            'description' =>'required',
            'image' => 'required',
        ]);

        $this->hero->title = $this->title;
        $this->hero->description = $this->description;
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
