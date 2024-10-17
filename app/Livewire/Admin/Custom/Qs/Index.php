<?php

namespace App\Livewire\Admin\Custom\Qs;

use Livewire\Component;
use App\Models\QS;

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
        $qs = QS::first();

        if ($qs) {
            $qs->text = $this->text;
            $qs->save();
        }

        redirect()->route('admin.qs');
    }

    public function render()
    {
        return view('livewire.admin.custom.qs.index')->layout('components.layouts.admin');
    }
}
