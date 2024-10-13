<?php

namespace App\Livewire\Admin\Reserves;

use Livewire\Component;
use App\Models\Reserve;
use App\Models\Sales;
use App\Models\Customers;
use Livewire\WithPagination;
use App\Services\notificationService;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteReserve($id)
    {
        $notificationService = new notificationService();
        $reserve = Reserve::findOrFail($id);
        if ($reserve->delete())
        {
            $notificationService->notify('success', 'Reserva deletada com sucesso!');
        } else {
            $notificationService->notify('error', 'Reserva não deletada!');
        }

        redirect()->route('reserves');
    }

    public function createSale($id)
    {
        $notificationService = new notificationService();
        $reserve = Reserve::findOrFail($id);

        $sale = Sales::create([
            'name' => $reserve->name,
            'email' => $reserve->email,
            'number' => $reserve->number,
            'cpf' => $reserve->cpf,
            'address' => $reserve->address,
            'product_name' => $reserve->product_name,
            'price' => $reserve->price,
            'payment_method' => $reserve->payment_method,
        ]);
        
        $reserve->delete();
        Customers::create([
            'name' => $reserve->name,
            'email' => $reserve->email,
            'number' => $reserve->number,
            'cpf' => $reserve->cpf,
            'address' => $reserve->address,
        ]);

        redirect()->route('reserves');
    }

    public function whatsappCustomer($id)
    {
        $notificationService = new notificationService();

        $link = "https://wa.me/5553984233841";

        return redirect()->away($link);
    }

    public function render()
    {
        $reserves = Reserve::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('number', 'like', '%' . $this->search . '%')
                  ->orWhere('product_name', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10);
        
        return view('livewire.admin.reserves.index', [
            'reserves' => $reserves,
            'search' => $this->search,
        ])->layout('components.layouts.admin');
    }
}
