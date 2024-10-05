<div class="font-family">  
@if (!$this->isComplete)
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Avalie Sua Compra!
                </h1>
                <div class="space-y-4 md:space-y-3">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                        <input type="text" name="name" disabled value="{{ $this->review->reviewer_name }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2 px-3" placeholder="name@company.com" required="">
                    </div>      
                    <div>
                        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Sua Nota</label>
                        <div class="flex items-center space-x-2">
                            <input wire:model="rating" type="number" min="0" max="10" name="grade" id="grade" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2 px-3 " placeholder="10" required="">
                            <span class="text-gray-900">/10</span>
                        </div>
                    </div>
                    <div>
                        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900">Fale Mais Sobre a Compra</label>
                        <input wire:model="comment" type="text" name="comment" id="comment" placeholder="Minha compra foi incrível!" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2 px-3" required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input wire:model="isanonymous" id="anonymous" aria-describedby="anonymous" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="anonymous" class="text-gray-500">Avaliação Anônima</label>
                            </div>
                        </div>
                    </div>
                    <button wire:click="sendReview" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar Avaliação</button>
                </div>
            </div>
        </div>
    </div>
@else   
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                </path>
            </svg>
            <div class="text-center">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Avaliação Enviada!</h3>
                <p class="text-gray-600 my-2">Obrigado por comprar conosco e nos avaliar!</p>
                <p> Tenha um ótimo dia!  </p>
                <div class="py-10 text-center">
                    <a href="{{ route('Home') }}" class="px-12 bg-blue-600 rounded-lg hover:bg-blue-500 text-white font-semibold py-3">
                        Voltar para tela inicial
                   </a>
                </div>
            </div>
        </div>
    </div>
@endif
</div>
