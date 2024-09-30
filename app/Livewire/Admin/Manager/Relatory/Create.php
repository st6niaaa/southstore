<?php

namespace App\Livewire\Admin\Manager\Relatory;

use Livewire\Component;
use App\Models\Relatory;
use App\Services\NotificationService;

class Create extends Component
{
    public $description;
    public $type;
    public $price;

    public function createRelatory()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'description' => ['required','string','max:255'],
            'type' => ['required','string'],
            'price' => ['required', 'numeric'],
        ]);

        Relatory::create([
            'description' => $this->description,
            'type' => $this->type,
            'value' => $this->price,
        ]);
        
        $notificationService->notify("success", "Registro salvo com sucesso!", 3000);
        redirect()->route('relatory');
    }

    public function render()
    {
        return view('livewire.admin.manager.relatory.create')->layout('components.layouts.admin');
    }
}
