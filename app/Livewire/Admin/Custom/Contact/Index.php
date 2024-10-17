<?php

namespace App\Livewire\Admin\Custom\Contact;

use Livewire\Component;
use App\Models\Contact;

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
        $contact = Contact::first();

        if ($contact) {
            $contact->text = $this->text;
            $contact->save();
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