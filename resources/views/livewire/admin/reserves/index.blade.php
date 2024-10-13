<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Reservas</h1>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-Mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Número
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Produto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Preço
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Método de pagamento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reserva criada em
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($reserves as $reserve)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $reserve->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $reserve->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $reserve->number }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $reserve->product_name }}
                    </td>
                    <td class="px-6 py-4">
                        R${{ $reserve->price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $reserve->payment_method }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $reserve->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="deleteReserve({{ $reserve->id }})">
                            <i class="fa fa-trash text-red-500"></i>
                        </button>
                        <button wire:click="createSale({{ $reserve->id }})">
                            <i class="fa fa-wallet text-yellow-500"></i>
                        </button>
                        <button wire:click="whatsappCustomer({{ $reserve->id }})">
                            <i class="fa-brands fa-whatsapp text-green-500"></i>
                        </button>
                    </td>
                </tr>
             
                @endforeach
                @if ($reserves->hasPages())
                    <tr class="bg-white"> 
                        <td colspan="5" class="py-1 px-3 text-center">
                            {{ $reserves->links() }} 
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>