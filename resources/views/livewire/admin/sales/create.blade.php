<div class="font-family p-2">
    <h1 class="text-2xl font-bold text-blue-700 mb-3">Nova Venda</h1>
       <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
           <div class="relative w-full">
               <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                   <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                       <div class="sm:col-span-2 sm:col-start-1">
                           <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Nome do Cliente</label>
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
                           <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Número de Telefone</label>
                           <div class="mt-2">
                               <div class="flex items-center space-x-2">
                                   <input wire:model="number" type="text" placeholder="(53) 12345-6789" name="number" id="number" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                               </div>
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
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Endereço</label>
                        <div class="mt-2">
                            <div class="flex items-center space-x-2">
                                <input wire:model="address" type="text" placeholder="Rua General Osório" name="address" id="address" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                 <div class="sm:col-span-2 sm:col-start-1">
                     <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Método de Pagamento</label>
                     <div class="mt-2">
                        <select wire:model="paymentmethod" id="small" class="block w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>Escolha um Pagamento</option>
                            <option value="PIX">PIX</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                            <option value="Boleto">Boleto</option>
                        </select>
                     </div>
                 </div>
                 <div class="sm:col-span-2">
                     <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Número de Parcelas</label>
                     <div class="mt-2">
                         <div class="flex items-center space-x-2">
                             <input wire:model="installments" type="number" placeholder="18" min="0" max="18" name="installments" id="installments" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                         </div>
                     </div>
                 </div>
             </div>

             <div class="flex items-center mt-4">
                <input wire:model="istodelete" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 ">Deletar Produto</label>
                <input wire:model="istoregister" id="another-checkbox" type="checkbox" value="" class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
               <label for="another-checkbox" class="ms-2 text-sm font-medium text-gray-900 ">Cadastrar Cliente</label>
            </div>

               <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                   <button wire:click="registerSale" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
               </div>
           </div>
       </div>
 
       
   </div>
   