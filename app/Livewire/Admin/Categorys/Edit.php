<?php

namespace App\Livewire\Admin\Categorys;

use Livewire\Component;
use App\Models\categorys;
use App\Services\NotificationService;

class Edit extends Component
{  
    public $category;
    public $name;

    public function mount(string|int $id)
    {
        $this->category = categorys::findOrFail($id);
        $this->name = $this->category->name;
    }

    public function updateCategory()
    {
        $notificationService = new NotificationService();
        $this->validate([
            'name' =>'required|min:3',
        ]);
        $this->category->name = $this->name;
        if ($this->category->save()){
            $notificationService->notify("success", "A categoria '" . $this->name . "' foi editada com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Ocorreu um erro ao editar a categoria!", 3000);
        }

        redirect()->route('categories');
    }

    public function render()
    {
        return view('livewire.admin.categorys.edit', [
            'category' => $this->category,
        ])->layout('components.layouts.admin');
    }
}
