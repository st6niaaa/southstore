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
        $reserves = Reserve::latest()->paginate(10);
        
        return view('livewire.admin.reserves.index', [
            'reserves' => $reserves
        ])->layout('components.layouts.admin');
    }
}
