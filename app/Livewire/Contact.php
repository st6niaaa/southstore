<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact as ContactModel;

class Contact extends Component
{
    public function render()
    {
        $contact = ContactModel::first();
        return view('livewire.contact', [
            'contact' => $contact,
        ]);
    }
}
