<div>
    @if ($this->view == 0)
    <div class="font-family p-2 md:px-[150px] md:mt-5">
        <h1 class="text-2xl font-bold text-blue-700 mb-3 flex justify-center">Fazer Reserva</h1>
           <div class="bg-white h-full p-2 rounded-lg flex flex-col sm:flex-row">
               <div class="relative w-full">
                   <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                       <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                           <div class="sm:col-span-2 sm:col-start-1">
                               <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Seu Nome</label>
                               <div class="mt-2">
                                   <input wire:model="name" type="text" placeholder="Fulano de tal" name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                               </div>
                           </div>
       
                           <div class="sm:col-span-2">
                               <label for="region" class="block text-sm font-medium leading-6 text-gray-900">E-Mail</label>
                               <div class="mt-2">
                                   <input wire:model="email" type="email" placeholder="fulanodetal@gmail.com" name="email" id="email" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                               </div>
                           </div>
                           
                           <div class="sm:col-span-2">
                                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Número de Telefone</label>
                                <div class="mt-2">
                                    <input wire:model="number" type="text" placeholder="(53) 12345-6789" name="number" id="number" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                </div>
                           </div>
                       </div>
                       <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                            <div class="mt-2">
                                <input wire:model="cpf" type="text" placeholder="000.000.000-00" name="cpf" id="cpf" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Endereço</label>
                            <div class="mt-2">
                                <input wire:model="address" type="text" placeholder="Rua General Osório" name="address" id="address" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Método de Pagamento</label>
                            <div class="mt-2">
                                <div class="flex items-center space-x-2">
                                    <select wire:model.lazy="payment_method" id="small" class="block w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                        <option selected>Escolha um Pagamento</option>
                                        <option value="PIX">PIX</option>
                                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                                        <option value="Cartão de Débito">Cartão de Débito</option>
                                        <option value="Boleto">Boleto</option>
                                    </select>
                                    @if ($this->payment_method == "Cartão de Crédito")
                                        <input wire:model="installments" type="text" placeholder="Número de parcelas" name="installments" id="installments" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                   <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                       <button wire:click="createReserve" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
                   </div>
               </div>
           </div>
     
           
       </div>
    @else
        <div class="font-family flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                    <path fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Reserva Enviada!</h3>
                    <p class="text-gray-600 my-2">Iremos entrar em contato com você em breve!</p>
                    <p> Tenha um ótimo dia! </p>
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
