<?php

namespace App\Livewire\Admin\Reviews;

use Livewire\Component;
use App\Models\Review;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $reviews = Review::paginate(10);
        return view('livewire.admin.reviews.index', [
            'reviews' => $reviews,
        ])->layout('components.layouts.admin');
    }
}
