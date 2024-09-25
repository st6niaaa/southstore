<div class="font-family p-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Editar Categoria</h1>
        <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
            <div class="relative w-full">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                  <div class="sm:flex sm:items-start">
               
                    <div class="sm:col-span-2 sm:col-start-1">
                      <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                      <div class="mt-2">
                          <input wire:model="name" type="text" name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  </div>
                </div>
                <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                  <button wire:click="updateCategory" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
                  <button onclick="closeModalPassword()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
                </div>
              </div>
        </div>
</div>