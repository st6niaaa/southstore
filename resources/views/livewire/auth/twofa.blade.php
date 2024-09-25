<div class="font-family">
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2 rounded" src="{{ asset('img/logo-wb.png') }}" alt="logo">
            </a>
            <div class="font-family w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Confirme o código do Autenticador
                    </h1>
                    <form class="space-y-4 md:space-y-6" wire:submit.prevent="authenticate">
                        <div>
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Código</label>
                            <input wire:model.lazy="code" type="text" name="code" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" autofocus placeholder="123456" required="">
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Confimar</button>
                    </form>
                </div>
            </div>
        </div>
      </section>
</div>
