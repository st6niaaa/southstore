<?php

namespace App\Livewire\Admin\Categorys;

use Livewire\Component;
use App\Models\categorys;
use App\Services\NotificationService;

class Index extends Component
{
    public $name;
    
    protected $rules = [
        'name' =>'required|min:3|max:255',
    ];

    public function createCategory()
    {
        $this->validate();
        $notificationService = new NotificationService();

        $category = new categorys();
        $category->name = $this->name;
        if ($category->save()) {
            $notificationService->notify("success", "Categoria criada com sucesso!", 3000);
        } else {
            $notificationService->notify("error", "Ocorreu um erro ao criar a categoria!", 3000);
        }
        redirect()->route('categories');
    }

    public function deleteCategory($id)
    {
        $notificationService = new NotificationService();
        $category = categorys::find($id);
        if ($category) {
            if ($category->delete())
            {
                $notificationService->notify("success", "Categoria excluída com sucesso!", 3000);
            } else {
                $notificationService->notify("error", "Ocorreu um erro ao excluir a categoria!", 3000);
            }
        } else {
            $notificationService->notify("error", "A categoria não foi encontrada!", 3000);
        }
    }

    public function render()
    {
        $categories = categorys::get();

        return view('livewire.admin.categorys.index', [
            'categories' => $categories,
        ])->layout('components.layouts.admin');
    }
}
