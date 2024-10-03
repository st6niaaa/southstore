<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>Admin - {{ config('app.name') }}</title>
        @endif
        
        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body class="bg-gray-200 font-family">
      
      @if (auth()->user()->status == 'Blocked')
        <script>window.location.href = "{{ route('logout') }}";</script> 
      @endif
      
      @livewire('notifications') 
        <div class="flex flex-col md:flex-row md:min-h-screen w-full">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
            
            <div @click.away="open = false" x-data="{ open: false }" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0">
              <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                <img class="h-[35px] rounded" src="{{ asset('img/logo-wb.png') }}" />
                <a href="#" class="md:mr-8 text-lg font-semibold text-gray-900 rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">South Store</a>
                <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                  <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
              <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <p class="text-sm opacity-70">Comuns</p>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('dashboard') }}"><i class="fa-solid fa-house cursor-pointer mr-2 block lg:hidden"></i> Início</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('profile') }}"><i class="fa-regular fa-user cursor-pointer mr-2 block lg:hidden"></i> Sua conta</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('logout') }}"><i class="fa-solid fa-right-from-bracket cursor-pointer mr-2 block lg:hidden"></i> Desconectar</a>
                <p class="text-sm opacity-70 mt-2">Vendas</p>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('categories') }}"><i class="fa-regular fa-folder cursor-pointer mr-2 block lg:hidden"></i>Categorias</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('admin.products') }}"><i class="fa-solid fa-list cursor-pointer mr-2 block lg:hidden"></i>Produtos</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('sales') }}"><i class="fa-regular fa-money-bill-1 cursor-pointer mr-2 block lg:hidden"></i>Vendas</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('customers') }}"><i class="fa-solid fa-user-tag cursor-pointer mr-2 block lg:hidden"></i>Clientes</a>
                <p class="text-sm opacity-70 mt-2">Simulações</p>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('simulations.creditcard') }}"><i class="fa-solid fa-credit-card cursor-pointer mr-2 block lg:hidden"></i>Cartão de Crédito</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('simulations.devices') }}"><i class="fa-brands fa-apple cursor-pointer mr-2 block lg:hidden"></i>Aparelhos</a>
                @if (auth()->user()->role == "Dono")
                  <p class="text-sm opacity-70 mt-2">Gestão</p>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('relatory') }}"><i class="fa-solid fa-right-left cursor-pointer mr-2 block lg:hidden"></i>Entrada/Saida</a>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('users') }}"><i class="fa-solid fa-users cursor-pointer mr-2 block lg:hidden"></i>Usuários</a>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('users') }}"><i class="fa-solid fa-business-time cursor-pointer mr-2 block lg:hidden"></i>Empresa</a>
                  <p class="text-sm opacity-70 mt-2">Personalização</p>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('hero') }}"><i class="fa-solid fa-plane-arrival cursor-pointer mr-2 block lg:hidden"></i>Hero</a>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('admin.qs') }}"><i class="fa-solid fa-user cursor-pointer mr-2 block lg:hidden"></i>Quem Somos</a>
                  <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-500 bg-transparent rounded-lg hover:text-gray-600 focus:outline-none focus:shadow-outline" href="{{ Route('admin.contact') }}"><i class="fa-solid fa-address-book cursor-pointer mr-2 block lg:hidden"></i>Contato</a>
                @endif
              </nav>
            </div>
            <div class="flex-grow py-2 px-3">
                @yield('body')
            </div>
        </div>
        @livewireScripts

    </body>
</html>