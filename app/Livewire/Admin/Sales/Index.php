<?php

namespace App\Livewire\Admin\Sales;

use Livewire\Component;
use App\Models\Sales;
use App\Models\Review;
use App\Services\NotificationService;
use Livewire\WithPagination; 

class Index extends Component
{
    use WithPagination;

    public function deleteSale($id)
    {
        $notificationService = new NotificationService();
        if (Sales::find($id)->delete()) {
            $notificationService->notify("success", "Venda excluída com sucesso!", 3000);
        }
        redirect()->route('sales');
    }

    public function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            // The error was in this line:
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
  
    public function createReview($id)
    {
        $notificationService = new NotificationService();
        $sale = Sales::findOrFail($id);
    
        // Check if a review with the given reviewer_id already exists
        $reviewExists = Review::where('reviewer_id', $id)->exists();
    
        if ($reviewExists) {
            $notificationService->notify('error', "Este cliente já registrou uma avaliação!");
        } else {
            $randomcode = $this->generateRandomString();
            Review::create([
                'reviewer_name' => $sale->name,
                'reviewer_id' => $id,
                'review_code' => $randomcode,
            ]);
    
            $reviewlink = config('APP_URL') . '/' . 'review/' . $id . '/' . $randomcode;
            return redirect()->away($reviewlink); 
        }
    
        return redirect()->route('sales'); 
    }

    public function render()
    {
        $sales = Sales::paginate(10);
        return view('livewire.admin.sales.index', [
            'sales' => $sales,
        ])->layout('components.layouts.admin');
    }
}