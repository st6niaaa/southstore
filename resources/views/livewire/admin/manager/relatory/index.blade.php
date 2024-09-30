<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Entrada/Saída</h1>
        <a href="{{ route('relatory.create')}}"><button class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Novo Registro</button></a>
    </div>

    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Valor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descrição
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
                @foreach ($relatorys as $relatory)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        @if ($relatory->type == 0)
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-green-400"><i class="fa-solid fa-arrow-down mr-1"></i> Entrada</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-red-400"><i class="fa-solid fa-arrow-up mr-1"></i> Saída</span>
                        @endif
                    </th>
                    <td class="px-6 py-4">
                        R$ {{ $relatory->value  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $relatory->description  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $relatory->created_at->format('d/m/Y')  }}
                    </td>
                    <td class="px-6 py-4">
                      <button wire:click="deleteRegistry({{ $relatory->id }})">
                          <i class="fa fa-trash text-red-500"></i>
                      </button>
                      <a href="{{  route('relatory.edit', $relatory->id) }}"><button class="">
                          <i class="fa fa-pen text-blue-500"></i>
                      </button></a>
                    </td>
                </tr>
             
                @endforeach

          
                @if ($relatorys->hasPages())
                    <tr class="bg-white"> 
                        <td colspan="5" class="py-1 px-3 text-center">
                            {{ $relatorys->links() }} 
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>