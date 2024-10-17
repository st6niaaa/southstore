<?php

namespace App\Livewire\Admin\Reviews;

use Livewire\Component;
use App\Models\Review;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        redirect()->route('reviews');
    }

    public function render()
    {
        $reviews = Review::where(function ($query) {
            $query->where('reviewer_name', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10);
        return view('livewire.admin.reviews.index', [
            'reviews' => $reviews,
        ])->layout('components.layouts.admin');
    }
}
