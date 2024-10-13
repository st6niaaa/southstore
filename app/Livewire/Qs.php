<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\QS as QSModel;

class Qs extends Component
{
    public function render()
    {
        $qs = QSModel::first();
        return view('livewire.qs', [
            'qs' => $qs,
        ]);
    }
}
