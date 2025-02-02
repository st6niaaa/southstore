<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Avaliações</h1>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <input wire:model.lazy="search" type="text" placeholder="Pesquise aqui" name="search" id="search" class="px-3 rounded-md border-0 py-1.5 mb-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nota
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Avaliação Registrada em
                    </th>
                    @if (auth()->user()->role == "Dono") <th scope="col" class="px-6 py-3">
                        Ações
                    </th> @endif
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $review->reviewer_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $review->reviewer_grade }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $review->reviewer_desc }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $review->created_at->format('d/m/Y H:i') }}
                    </td>
                    @if (auth()->user()->role == "Dono") <td class="px-6 py-4">
                      <button wire:click="deleteReview({{ $review->id }})">
                          <i class="fa fa-trash text-red-500"></i>
                      </button>
                    </td> @endif
                </tr>
             
                @endforeach
                @if ($reviews->hasPages())
                    <tr class="bg-white"> 
                        <td colspan="10" class="py-1 px-3 text-center">
                            {{ $reviews->links() }} 
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>