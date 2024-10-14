<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Sales;
use App\Models\Relatory;

class Index extends Component
{
    function getSalesPercentageChange() {
      $currentTime = Carbon::now();
    
      // Current month sales
      $currentMonthSales = Sales::whereYear('created_at', $currentTime->year)
        ->whereMonth('created_at', $currentTime->month)
        ->count();
    
      // Previous month sales
      $previousMonth = $currentTime->subMonth();
      $previousMonthSales = Sales::whereYear('created_at', $previousMonth->year)
        ->whereMonth('created_at', $previousMonth->month)
        ->count();
    
      // Calculate percentage change
      if ($previousMonthSales > 0) {
        $percentageChange = (($currentMonthSales - $previousMonthSales) / $previousMonthSales) * 100;
      } else {
        $percentageChange = $currentMonthSales > 0 ? 100 : 0; // Handle cases where there were no sales in the previous month
      }
    
      return $percentageChange;
    }

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

        $addvalueyear = Relatory::where('type', 0)
            ->whereYear('created_at', $currentTime->year)
            ->sum('value');
    
        $reducevalueyear = Relatory::where('type', 1)
            ->whereYear('created_at', $currentTime->year)
            ->sum('value');

        $addvaluemonth = Relatory::where('type', 0)
            ->whereYear('created_at', $currentTime->year) 
            ->whereMonth('created_at', $currentTime->month)
            ->sum('value');
        
        $reducevaluemonth = Relatory::where('type', 1)
            ->whereYear('created_at', $currentTime->year) 
            ->whereMonth('created_at', $currentTime->month)
            ->sum('value');
    

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
        
        $revenuePerMonth += $addvaluemonth;
        $revenuePerMonth -= $reducevaluemonth;
        
        $revenuePerYear += $addvalueyear;
        $revenuePerYear -= $reducevalueyear;
        // Format revenue with "k" for thousands
        $formattedRevenuePerMonth = $this->format($revenuePerMonth);
        $formattedRevenuePerYear = $this->format($revenuePerYear);

        $grossRevenue = Sales::whereYear('created_at', $currentTime->year)
            ->whereMonth('created_at', $currentTime->month)
            ->sum('price');

        $salesMonth = Sales::whereYear('created_at', $currentTime->year)
            ->whereMonth('created_at', $currentTime->month)
            ->get();
        
        $salesYear = Sales::whereYear('created_at', $currentTime->year)
            ->get();

        $totalProfitMonth = 0;
        foreach ($salesMonth as $sale)
        {
            $profit = $sale->price - $sale->bought_value;
            $totalProfitMonth += $profit;
        }

        $revenueChartMonth = $totalProfitMonth;
        $revenueChartMonth += $addvaluemonth;
        $revenueChartMonth -= $reducevaluemonth;

        $totalProfitYear = 0;
        foreach ($salesYear as $sale)
        {
            $profit = $sale->price - $sale->bought_value;
            $totalProfitYear += $profit;
        }
        
        $formattedProfitM = $this->format($totalProfitMonth);
        $formattedProfitY = $this->format($totalProfitYear);

        return view('livewire.admin.index', [
            'greeting' => $greeting,
            'salesPerMonth' => $salesPerMonth,
            'salesPerYear' => $salesPerYear,
            'revenuePerMonthChart' => $revenuePerMonth,
            'revenuePerYearChart' => $revenuePerYear,
            'revenuePerMonth' => $formattedRevenuePerMonth, 
            'revenuePerYear' => $formattedRevenuePerYear,
            'grossRevenue' => $grossRevenue,
            'profitMonth' => $formattedProfitM,
            'profitYear' => $formattedProfitY,
            'getSalesPercentageChange' => $this->getSalesPercentageChange(),
            'revenueChartMonth' => $revenueChartMonth,
        ])->layout('components.layouts.admin');
    }

    private function format($revenue)
    {
        if ($revenue >= 1000) {
            return number_format($revenue / 1000, 1) . 'k'; 
        } else {
            return number_format($revenue, 2, ',', '.'); 
        }
    }
}