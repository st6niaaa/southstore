<?php

namespace App\Livewire\Review;

use Livewire\Component;
use App\Models\Review;

class Index extends Component
{
    public $review;
    public $rating;
    public $comment;
    public $isanonymous;
    public $isComplete;

    public function mount($id)
    {
        $review = Review::where('review_code', $id);
        $this->review = $review->first();
        if ($this->review->reviewer_grade !== null) {
            redirect()->route('Home');
        }
    }

    public function sendReview()
    {
        $this->validate([
            'rating' => ['required', 'numeric','min:1','max:10'],
            'comment' => ['required','string','min:10','max:500'],
        ]);

        $this->review->reviewer_grade = $this->rating;
        $this->review->reviewer_desc = $this->comment;
        
        if ($this->isanonymous) {
            $this->review->is_anonymous = true;
        } else {
            $this->review->is_anonymous = false;
        }

        $this->review->save();
        $this->isComplete = true;

        return;
    }

    public function render()
    {
        return view('livewire.review.index')->layout('components.layouts.wapp');
    }
}
