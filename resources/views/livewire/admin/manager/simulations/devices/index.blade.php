<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Imperfeições</h1>
        <a href="{{ route('manager.simulations.device.create')}}"><button class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Nova Imperfeição</button></a>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Valor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Criado em
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($breakdowns as $breakdown)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $breakdown->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $breakdown->description }}
                    </td>
                    <td class="px-6 py-4">
                        R${{ $breakdown->value }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $breakdown->created_at->format('d/m/Y')  }}
                    </td>
                    <td class="px-6 py-4">
                      <button wire:click="deleteBreakdown({{ $breakdown->id }})">
                          <i class="fa fa-trash text-red-500"></i>
                      </button>
                      <a href="{{  route('manager.simulations.device.edit', $breakdown->id) }}"><button class="">
                          <i class="fa fa-pen text-blue-500"></i>
                      </button></a>
                    
                    </td>
                </tr>
             
                @endforeach

          
                @if ($breakdowns->hasPages())
                    <tr class="bg-white"> 
                        <td colspan="5" class="py-1 px-3 text-center">
                            {{ $breakdowns->links() }} 
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>