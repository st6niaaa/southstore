<?php

namespace App\Livewire\Admin\Custom\Contact;

use Livewire\Component;
use App\Models\Contact;
use App\Services\notificationService;

class Index extends Component
{
    public $text;

    public function mount()
    {
        $contact = Contact::first();
        $this->text = $contact->text;
    }

    public function save()
    {
        $notificationService = new notificationService();
        $contact = Contact::first();

        if ($contact) {
            $contact->text = $this->text;
            if ($contact->save())
            {
                $notificationService->notify('success', 'Contato Atualizado com Sucesso!');
            } else {
                $notificationService->notify('error', 'Contato não Atualizado!');
            }
        }

        redirect()->route('admin.contact');
    }
    
    public function render()
    {
        return view('livewire.admin.custom.contact.index', [
            'text' => $this->text,
        ])->layout('components.layouts.admin');
    }
}