<div class="font-family p-2">
    <h1 class="text-2xl font-family-bold text-blue-700 mb-3">Seu Perfil</h1>

    @if (auth()->user()->two_factor_secret == NULL)
        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
              <b>AVISO:</b> A autenticação de dois fatores não está ativa, por favor, habilite-a para uma maior segurança.
            </div>
        </div>
    @endif
    <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
        <div class="sm:w-1/3">
            <img src="{{ asset('img/profiles/rnc.png') }}" alt="Your Image" class="h-[300px] rounded-full mx-auto">
            <div class="text-center mt-2">
                <button class="text-sm bg-transparent border border-blue-600 hover:bg-gray-200 py-1 px-3 rounded-md">Alterar Imagem</button>
            </div>
        </div>
        <div class="sm:w-2/3 p-4">
            <div class="border-b border-gray-900/10 pb-3">
                
            

                    <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                            <div class="mt-2">
                                <input wire:model="name" type="text" name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    
                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">E-Mail</label>
                            <div class="mt-2">
                                <input wire:model="email" type="email" name="email" id="email" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">2FA</label>
                            <div class="mt-2">
                                <button wire:click="userEdit" class="text-sm bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-md">Autenticação de dois fatores</button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="mt-3">
                <button wire:click="userEdit" class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Save</button>
                <button class="text-sm bg-transparent border border-blue-600 hover:bg-gray-200 py-1 px-3 rounded-md">Alterar Senha</button>

            </div>
        </div>
    </div>
</div>
