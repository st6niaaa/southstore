<div class="font-family">
  <div class="p-2 w-full">
    <h1 class="text-2xl font-family font-bold text-blue-700 mb-3">{{ $greeting }}, {{ explode(' ', auth()->user()->name)[0] }}</h1>

    @if (auth()->user()->role == "Dono")
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
          <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
            <i class="fa fa-users"></i>
          </div>
          <div class="flex flex-col flex-grow ml-4">
            <div class="text-sm text-gray-500">Vendas /mês</div>
            <div class="font-bold text-lg">{{ $salesPerMonth }} 

              @if ($getSalesPercentageChange >= 0)
                <span class="bg-green-200 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                  <i class="fa-solid fa-sort-up"></i> {{ number_format($getSalesPercentageChange, 2) }}%
                </span>
              @else
              <span class="bg-red-200 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <i class="fa-solid fa-sort-down"></i> {{ number_format($getSalesPercentageChange, 2) }}%
              </span>
              @endif
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
          <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
            <i class="fa-solid fa-bag-shopping"></i>
          </div>
          <div class="flex flex-col flex-grow ml-4">
            <div class="text-sm text-gray-500">Vendas /ano</div>
            <div class="font-bold text-lg">{{ $salesPerYear }}</div>
          </div>
        </div>
      </div>
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
          <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
            <i class="fa-solid fa-money-bill-1-wave"></i>
          </div>
          <div class="flex flex-col flex-grow ml-4">
            <div class="text-sm text-gray-500">MLA /mês</div>
            <div class="font-bold text-lg">R$ {{ $profitMonth }}</div>
          </div>
        </div>
      </div>
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="flex flex-row bg-white shadow-sm rounded p-4">
          <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          </div>
          <div class="flex flex-col flex-grow ml-4">
            <div class="text-sm text-gray-500">MLA /ano</div>
            <div class="font-bold text-lg">R$ {{ $profitYear }}</div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="font-family shadow-lg md:max-w-[350px] mt-2 rounded-lg overflow-hidden">
      <div class="py-3 px-5 bg-white"> Receita /mês</div>
      <div class="p-10 bg-white"><canvas id="chartDoughnut"></canvas></div>
    </div>
    
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Chart doughnut -->
    <script>
      const dataDoughnut = {
        labels: ["Saldo Bruto", "Saldo Líquido"],
        datasets: [
          {
            label: "Receita",
            data: [<?php echo $grossRevenue ?>, <?php echo $revenueChartMonth ?>],
            backgroundColor: [
              "rgb(133, 105, 241)",
              "rgb(164, 101, 241)",
            ],
            hoverOffset: 4,
          },
        ],
      };
    
      const configDoughnut = {
        type: "doughnut",
        data: dataDoughnut,
        options: {},
      };
    
      var chartBar = new Chart(
        document.getElementById("chartDoughnut"),
        configDoughnut
      );
    </script>

  </div>
  @endif
</div>