<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Categorias</h1>
        @if (auth()->user()->role == "Dono") <button onclick="openModal()" class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Nova Categoria</button> @endif
    </div>
    <div class="relative overflow-x-auto rounded-md">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Nome da Categoria
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Criada em
                  </th>
                  @if (auth()->user()->role == "Dono")
                  <th scope="col" class="px-6 py-3">
                      Ações
                  </th>
                  @endif
              </tr>
          </thead>
          <tbody>
              @foreach ($categories as $category)
                  <tr class="bg-white border-b">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                          {{ $category->name }}
                      </th>
                      <td class="px-6 py-4">
                          {{ $category->created_at->format('d/m/Y') }}
                      </td>
                      @if (auth()->user()->role == "Dono")
                      <td class="px-6 py-4">
                          <button wire:click="deleteCategory({{ $category->id }})">
                              <i class="fa fa-trash text-red-500"></i>
                          </button>
                          <a href="{{ route('categories.edit', $category->id) }}">
                              <button>
                                  <i class="fa fa-pen text-blue-500"></i>
                              </button>
                          </a>
                      </td>
                      @endif
                  </tr>
              @endforeach

              @if ($categories->hasPages())
                  <tr class="bg-white"> 
                      <td colspan="3" class="py-1 px-3 text-center">
                          {{ $categories->links() }} 
                      </td>
                  </tr>
              @endif
  
          </tbody>
      </table>
  </div>

     <!-- Create -->
    <div class="modal hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                    <i class="fa fa-lock text-green-600"></i>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4" id="modal-title">Adicionar nova Categoria</h3>
                  <div class="">
                    <div class="flex justify-center">
                    </div>
                    <p for="name" class="block text-sm font-medium leading-5 text-gray-700">Nome</label>
                    <input wire:model="name" type="text" name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">                
                </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button wire:click="createCategory" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
              <button onclick="closeModal()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
            </div>
          </div>
  </div>
     
    <!-- Delete Modal -->
    <div class="deleteModal hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fa fa-trash text-red-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Deletar Categoria</h3>
                        <p class="text-sm text-gray-500 mb-2">Você tem certeza que deseja apagar a categoria?</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button wire:click="" id="confirm-delete" type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                    Confirmar
                </button>
                <button onclick="closeDeleteModal()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
            </div>
        </div>
    </div>
  
      <style>
          .modal {
            display: none;
            /* Additional styles for modal */
          }
  
          .modal.open {
            display: flex;
            animation: fadeIn 0.3s ease-in-out;
          }
  
          .modal.closing {
            animation: fadeOut 0.3s ease-in-out;
          }

          .deleteModal {
            display: none;
            /* Additional styles for delete modal */
          }
          .deleteModal.open {
            display: flex;
            animation: fadeIn 0.3s ease-in-out;
          }
          .deleteModal.closing {
            animation: fadeOut 0.3s ease-in-out;
          }

  
          @keyframes fadeIn {
            from {
              opacity: 0;
            }
            to {
              opacity: 1;
            }
          }
  
          @keyframes fadeOut {
            from {
              opacity: 1;
            }
            to {
              opacity: 0;
            }
          }
        </style>
        <script>

            let deleteCategoryId = null;

            function setDeleteId(id) {
                deleteCategoryId = id; // Store the ID of the selected category
                openDeleteModal(); // Open the delete confirmation modal
            }

            function confirmDelete() {
                // This function is called when confirming deletion
                if (deleteCategoryId !== null) {
                    // Call your Livewire method with the ID
                    @this.call('deleteCategory', deleteCategoryId);
                }
            }

            function openDeleteModal() {
                const modal = document.querySelector('.deleteModal');
                modal.classList.add('open');
            }

            function closeDeleteModal() {
                const modal = document.querySelector('.deleteModal');
                modal.classList.remove('open');
                modal.classList.add('closing');
            
                setTimeout(() => {
                    modal.classList.remove('closing');
                    modal.classList.add('hidden');
                }, 300);
            }

          function openModal() {
            const modal = document.querySelector('.modal');
            modal.classList.add('open');
          }

          function closeModal() {
            const modal = document.querySelector('.modal');
            modal.classList.remove('open');
            modal.classList.add('closing');
          
            setTimeout(() => {
              modal.classList.remove('closing');
              modal.classList.add('hidden'); // Add this line to hide the modal after the animation
            }, 300); // Adjust the timeout duration as needed
          }
          
          
        </script>
</div>
