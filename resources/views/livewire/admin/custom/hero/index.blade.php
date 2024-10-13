<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Hero Section</h1>
        <a href="{{ route('hero.create')}}"><button class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Nova Hero</button></a>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Imagem
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
                @foreach ($heros as $hero)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $hero->image_url  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $hero->created_at->format('d/m/Y')  }}
                    </td>
                    <td class="px-6 py-4">
                      <button wire:click="deleteHero({{ $hero->id }})">
                          <i class="fa fa-trash text-red-500"></i>
                      </button>
                      <a href="{{  route('hero.edit', $hero->id) }}"><button class="">
                          <i class="fa fa-pen text-blue-500"></i>
                      </button></a>
                    </td>
                </tr>
             
                @endforeach
            </tbody>
        </table>
    </div>
</div>