<div class="font-family p-2">
    <h1 class="text-2xl font-bold text-blue-700 mb-3">Adicionar Imagens</h1>
    <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
        <div class="relative w-full">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
           
                <div class="sm:col-span-2 sm:col-start-1">
                  <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Enviar Arquivo</label>
                  <div class="mt-2">
                    <form action="{{ route('file.uploadtwo') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="flex items-center">
                                  <label for="file-upload" class="cursor-pointer text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">
                                      Enviar Arquivo
                                  </label>
                                  <input id="file-upload" type="file" name="image" multiple  required class="hidden" />
                              </div>
                                   
                        </div>
                    <input type="hidden" name="id" value="{{ $productid }}" />
              </div>
              </div>
            </div>
            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button type="submit" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
              <button wire:click="removePhotos" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Remover Imagens</button>
            </div>
        </form>
          </div>
    </div>
</div>