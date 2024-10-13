<?php

namespace App\Livewire\Admin\Custom\Qs;

use Livewire\Component;
use App\Models\QS;
use App\Services\notificationService;

class Index extends Component
{
    public $text;

    public function mount()
    {
        $qs = QS::first();
        if (!$qs) {
            QS::create([
                'text' => "texto exemplo..."
            ]);
        }

        $this->text = $qs->text;
    }

    public function save()
    {
        $notificationService = new notificationService();
        $qs = QS::first();

        if ($qs) {
            $qs->text = $this->text;
            if ($qs->save())
            {
                $notificationService->notify('success', 'Quem Somos Atualizado com Sucesso!');
            } else {
                $notificationService->notify('error', 'Quem Somos não Atualizado!');
            }
        }

        redirect()->route('admin.qs');
    }

    public function render()
    {
        return view('livewire.admin.custom.qs.index')->layout('components.layouts.admin');
    }
}
