<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Usuários</h1>
        <a href="{{ route('users.create')}}"><button class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Novo Usuário</button></a>
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
                        Nível de permissão
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
                @foreach ($users as $user)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex items-center"> 
                        @if(file_exists(public_path('img/profiles/' . $user->id . '.png'))) 
                            <img class="h-8 w-8 rounded-full bg-gray-100 object-cover object-center mr-2" src="{{ asset('img/profiles/' . $user->id . '.png') }}" alt="{{ $user->name }}'s Profile Picture"> 
                        @endif
                        @if ($user->status == 'Blocked')
                            <span class="text-red-500 font-semibold">{{ $user->name }}</span>
                        @else
                            <span class="font-semibold">{{ $user->name }}</span>
                        @endif
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email  }}
                    </td>
                    <td class="px-6 py-4">

                        @if ($user->status == "Blocked")
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 uppercase rounded border border-red-400"><i class="fa-solid fa-xmark"></i> Bloqueado</span>
                        @else
                            @if ($user->role == 'Dono')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 uppercase rounded border border-yellow-300"><i class="fa-solid fa-crown"></i> {{ $user->role  }}</span>
                            @else
                                <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 uppercase rounded border border-indigo-400"><i class="fa-solid fa-user"></i> {{ $user->role }}</span>
                            @endif
                        @endif

                        
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->created_at->format('d/m/Y')  }}
                    </td>
                    <td class="px-6 py-4">
                      <button wire:click="deleteUser({{ $user->id }})">
                          <i class="fa fa-trash text-red-500"></i>
                      </button>
                      <a href="{{  route('users.edit', $user->id) }}"><button class="">
                          <i class="fa fa-pen text-blue-500"></i>
                      </button></a>
                      <button wire:click="blockUser({{ $user->id }})">
                        @if ($user->status == 'Blocked')
                            <i class="fa-solid fa-scale-unbalanced-flip text-green-500"></i>
                        @else
                            <i class="fa-solid fa-ban text-yellow-500"></i>
                        @endif
                      </button>
                    </td>
                </tr>
             
                @endforeach

          
                @if ($users->hasPages())
                    <tr class="bg-white"> 
                        <td colspan="5" class="py-1 px-3 text-center">
                            {{ $users->links() }} 
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>