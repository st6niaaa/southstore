<?php

namespace App\Livewire\Admin\Manager\Business;

use Livewire\Component;
use App\Models\Business;
use App\Services\notificationService;

class Index extends Component
{
    public $corporate_reason;
    public $name;
    public $cnpj;
    public $legal_nature;
    public $opening_date;
    public $CNAE;
    public $social_capital;
    public $address;

    public function mount()
    {
        if (Business::count() === 0)
        {
            Business::create([
                'corporate_reason' => 'Comércio Varejista', // Replace with your desired default value
                'name' => 'South Store', // Replace with your desired default value
                'cnpj' => '00.000.000/0000-00', // Replace with your desired default value
                'legal_nature' => 'Natureza Legal', // Replace with your desired default value
                'opening_date' => now(), // Replace with your desired default value
                'CNAE' => '0000-0/00', // Replace with your desired default value
                'social_capital' => '10.000', // Replace with your desired default value
                'address' => 'General Osório', // Replace with your desired default value
            ]);
        } else {
            $business = Business::first(); 

            $this->corporate_reason = $business->corporate_reason;
            $this->name = $business->name;
            $this->cnpj = $business->cnpj;
            $this->legal_nature = $business->legal_nature;
            $this->opening_date = $business->opening_date;
            $this->CNAE = $business->CNAE;
            $this->social_capital = $business->social_capital;
            $this->address = $business->address;
        }
    }

    public function updateBusiness()
    {
        $notificationService = new notificationService();
        $this->validate([
            'name' => "required",
            'cnpj' => "required",
        ]);

        $business = Business::first();

        $business->update([
            'corporate_reason' => $this->corporate_reason,
            'name' => $this->name,
            'cnpj' => $this->cnpj,
            'legal_nature' => $this->legal_nature,
            'opening_date' => $this->opening_date,
            'CNAE' => $this->CNAE,
            'social_capital' => $this->social_capital,
            'address' => $this->address,
        ]);

        $notificationService->notify('success', "Dados da empresa atualizados com sucesso!");

        redirect()->route('business');
    }

    public function render()
    {
        return view('livewire.admin.manager.business.index')->layout('components.layouts.admin');
    }
}
