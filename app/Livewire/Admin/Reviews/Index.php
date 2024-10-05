<?php

namespace App\Livewire\Admin\Reviews;

use Livewire\Component;
use App\Models\Review;
use Livewire\WithPagination;
use App\Services\notificationService;

class Index extends Component
{
    use WithPagination;

    public function deleteReview($id)
    {
        $notificationService = new NotificationService();
        $review = Review::findOrFail($id);
        if ($review->delete()) 
        {
            $notificationService->notify('success', 'Avaliação excluída com sucesso!');
        } else {
            $notificationService->notify('error', 'Ocorreu um erro ao excluir a avaliação.');
        }

        redirect()->route('reviews');
    }

    public function render()
    {
        $reviews = Review::paginate(10);
        return view('livewire.admin.reviews.index', [
            'reviews' => $reviews,
        ])->layout('components.layouts.admin');
    }
}
