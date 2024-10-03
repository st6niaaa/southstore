<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Vendas</h1>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome do Cliente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-Mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Número de Telefone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome do Produto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Preço
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Método de Pagamento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Venda Registrada em
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $sale->name  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $sale->email  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $sale->number }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $sale->product_name }}
                    </td>
                    <td class="px-6 py-4">
                        R${{ $sale->price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $sale->payment_method }}
                        @if ($sale->payment_method != "PIX" && $sale->payment_method != "Cartão de Débito" && $sale->payment_method != "Boleto")
                            ({{ $sale->installments }}x)
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ $sale->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4">
                      <button wire:click="deleteSale({{ $sale->id }})">
                          <i class="fa fa-trash text-red-500"></i>
                      </button>
                      <a href="{{ route('sales.edit', $sale->id) }}"><button class="">
                          <i class="fa fa-pen text-blue-500"></i>
                      </button></a>
                    </td>
                </tr>
             
                @endforeach
                @if ($sales->hasPages())
                    <tr class="bg-white"> 
                        <td colspan="5" class="py-1 px-3 text-center">
                            {{ $sales->links() }} 
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>