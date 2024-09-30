<?php

namespace App\Livewire\Admin\Manager\Relatory;

use Livewire\Component;
use App\Models\Relatory;
use App\Services\NotificationService;
use Livewire\WithPagination;
use App\Http\Controllers\telegramController;

class Index extends Component
{
    use WithPagination; // Apply the trait

    public function deleteRegistry($id)
    {
        $notificationService = new NotificationService();
        $relatory = Relatory::find($id);
        if ($relatory->delete()) {
            telegramController::message("O registro de entrada/saída: {$relatory->description} foi excluído!");
            $notificationService->notify("success", "Registro excluído com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "O registro não foi excluído!", 3000);
        }
        
        redirect()->route('relatory');
    }
    
    public function render()
    {
        $relatorys = Relatory::paginate(10);
        
        return view('livewire.admin.manager.relatory.index', [
            'relatorys' => $relatorys,
        ])->layout('components.layouts.admin');
    }
}
