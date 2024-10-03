<div class="font-family p-2">
    <h1 class="text-2xl font-bold text-blue-700 mb-3">Dados da Empresa</h1>
       <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
           <div class="relative w-full">
               <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                   <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                       <div class="sm:col-span-2 sm:col-start-1">
                           <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Nome da Empresa</label>
                           <div class="mt-2">
                               <input wire:model="name" type="text" placeholder="South Store" name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                           </div>
                       </div>
   
                       <div class="sm:col-span-2">
                           <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Razão Social</label>
                           <div class="mt-2">
                               <input wire:model="corporate_reason" type="text" placeholder="Comércio" name="corporate_reason" id="corporate_reason" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                           </div>
                       </div>
                       
                       <div class="sm:col-span-2">
                           <label for="region" class="block text-sm font-medium leading-6 text-gray-900">CNPJ</label>
                           <div class="mt-2">
                               <div class="flex items-center space-x-2">
                                   <input wire:model="cnpj" type="text" placeholder="00.000.000/0000-00" name="cnpj" id="cnpj" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Natureza Legal</label>
                        <div class="mt-2">
                            <input wire:model="legal_nature" type="text" placeholder="Natureza Legal" name="legal_nature" id="legal_nature" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">CNAE</label>
                        <div class="mt-2">
                            <div class="flex items-center space-x-2">
                                <input wire:model="CNAE" type="text" placeholder="0000-0/00" name="CNAE" id="CNAE" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Capital Social</label>
                        <div class="mt-2">
                            <div class="flex items-center space-x-2">
                                <span>R$</span>
                                <input wire:model="social_capital" type="text" placeholder="10.000" name="CNAE" id="CNAE" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Endereço</label>
                        <div class="mt-2">
                            <div class="flex items-center space-x-2">
                                <input wire:model="address" type="text" placeholder="Rua General Osório" name="address" id="address" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

               <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                   <button wire:click="updateBusiness" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
               </div>
           </div>
       </div>
 
       
   </div>
   