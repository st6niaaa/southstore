<?php

namespace App\Livewire\Admin\Manager\Relatory;

use Livewire\Component;
use App\Services\NotificationService;
use App\Models\Relatory;
use App\Http\Controllers\telegramController;

class Edit extends Component
{
    public $relatory;
    public $description;
    public $type;
    public $price;

    public function mount($id)
    {
        $this->relatory = Relatory::findOrFail($id);
        $this->description = $this->relatory->description;
        $this->type = $this->relatory->type;
        $this->price = $this->relatory->value;
    }

    public function updateRelatory()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'description' => ['required','string','max:255'],
            'type' => ['required','string'],
            'price' => ['required', 'numeric'],
        ]);

        $this->relatory->description = $this->description;
        $this->relatory->type = $this->type;
        $this->relatory->value = $this->price;
        if ($this->relatory->save()) {
            $notificationService->notify("success", "Registro atualizado com sucesso!", 3000);
            telegramController::message("O registro de entrada/saída: {$this->relatory->description} foi editado!");
        } else {
            $notificationService->notify("error", "Não foi possível atualizar o registro!", 3000);
        }
        
        redirect()->route('relatory');
    }

    public function render()
    {
        return view('livewire.admin.manager.relatory.edit')->layout('components.layouts.admin');
    }
}
