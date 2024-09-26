<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Sales;

class Index extends Component
{
    public function render()
    {
        $currentTime = Carbon::now('America/Sao_Paulo');
        $hour = $currentTime->hour;

        if ($hour >= 0 && $hour < 12) {
            $greeting = "Bom dia";
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = "Boa tarde";
        } else {
            $greeting = "Boa noite";
        }

        // Calculate Sales and Revenue Metrics
        $salesPerMonth = Sales::whereYear('created_at', $currentTime->year)
            ->whereMonth('created_at', $currentTime->month)
            ->count();

        $salesPerYear = Sales::whereYear('created_at', $currentTime->year)
            ->count();

        $revenuePerMonth = Sales::whereYear('created_at', $currentTime->year)
            ->whereMonth('created_at', $currentTime->month)
            ->sum('price');

        $revenuePerYear = Sales::whereYear('created_at', $currentTime->year)
            ->sum('price');

        // Format revenue with "k" for thousands
        $formattedRevenuePerMonth = $this->formatRevenue($revenuePerMonth);
        $formattedRevenuePerYear = $this->formatRevenue($revenuePerYear);

        return view('livewire.admin.index', [
            'greeting' => $greeting,
            'salesPerMonth' => $salesPerMonth,
            'salesPerYear' => $salesPerYear,
            'revenuePerMonth' => $formattedRevenuePerMonth, 
            'revenuePerYear' => $formattedRevenuePerYear, 
        ])->layout('components.layouts.admin');
    }

    private function formatRevenue($revenue)
    {
        if ($revenue >= 1000) {
            return number_format($revenue / 1000, 1) . 'k'; 
        } else {
            return number_format($revenue, 2, ',', '.'); 
        }
    }
}