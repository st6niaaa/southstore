<?php

namespace App\Livewire\Admin\Custom\Contact;

use Livewire\Component;
use App\Models\Contact as ModelContact;

class Index extends Component
{
    public $contact;
    public $text;
    
    public function render()
    {
        return view('livewire.admin.custom.contact.index', [
            'text' => $this->contact->text ?? "",
        ])->layout('components.layouts.admin');
    }
}
