<div class="font-family p-2">
    <h1 class="text-2xl font-bold text-blue-700 mb-3">Novo Registro</h1>
       <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
           <div class="relative w-full">
               <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                   <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                       <div class="sm:col-span-2 sm:col-start-1">
                           <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Descrição</label>
                           <div class="mt-2">
                               <input wire:model="description" type="text" placeholder="Aluguel, Luz, etc..." name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                           </div>
                       </div>
   
                       <div class="sm:col-span-2">
                           <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Tipo</label>
                           <div class="mt-2">
                               <select wire:model="type" id="small" class="block w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                   <option selected>Escolha um Tipo</option>
                                    <option value="0">Entrada</option>
                                    <option value="1">Saída</option>
                               </select>
                           </div>
                       </div>
                       
                       <div class="sm:col-span-2">
                           <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Valor</label>
                           <div class="mt-2">
                               <div class="flex items-center space-x-2">
                                   <span class="text-gray-900">R$</span>
                                   <input wire:model="price" type="number" placeholder="300" min="0" name="price" id="price" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                   <button wire:click="updateRelatory" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
               </div>
           </div>
       </div>
   </div>   