<div class="font-family p-2">
    <h1 class="text-2xl font-family-bold text-blue-700 mb-3">Seu Perfil</h1>

    @if (auth()->user()->two_factor_secret == NULL)
        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span class="sr-only">Info</span>
            <div class="ms-2 text-sm font-medium">
              <b>AVISO:</b> A autenticação de dois fatores não está ativa, por favor, habilite-a para uma maior segurança.
            </div>
        </div>
    @endif
    <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
        <div class="sm:w-1/3">
            <img src="{{ asset('img/profiles/'. auth()->user()->id .'.png') }}" alt="Profile Pic" class="h-[300px] w-[300px] rounded-full mx-auto">
            <div class="text-center mt-2">
                <button onclick="openModalPic()" class="text-sm bg-transparent border border-blue-600 hover:bg-gray-200 py-1 px-3 rounded-md">Alterar Imagem</button>
            </div>
        </div>
        <div class="sm:w-2/3 p-4">
            <div class="border-b border-gray-900/10 pb-3">
                    <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                            <div class="mt-2">
                                <input wire:model="name" type="text" name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    
                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">E-Mail</label>
                            <div class="mt-2">
                                <input wire:model="email" type="email" name="email" id="email" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">2FA</label>
                            <div class="mt-2">
                                @if (auth()->user()->two_factor_secret == NULL)
                                    <button onclick="openModal()" class="text-sm bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-md">Autenticação de dois fatores</button>
                                @else
                                    <button onclick="openModal()" class="text-sm bg-transparent border border-blue-600 hover:bg-gray-200 py-1 px-3 rounded-md">Remover Aut. de dois fatores</button>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="mt-3">
                <button wire:click="userEdit" class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Salvar</button>
                <button onclick="openModalPassword()" class="text-sm bg-transparent border border-blue-600 hover:bg-gray-200 py-1 px-3 rounded-md">Alterar Senha</button>

            </div>
        </div>
    </div>
    
    <!-- Change Password -->
    <div class="modalp hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                  <i class="fa fa-key text-orange-600"></i>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Alteração de Senha</h3>
                <div class="">
                  <div class="flex justify-center">
                  </div>
                  <p class="text-sm text-gray-500 mb-3">Insira sua senha nova abaixo.<p>
                  <input wire:model="actualpassword" type="password" name="actualpassword" id="actualpassword" placeholder="Senha Antiga" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">                
                  <input wire:model="newpassword" type="password" name="newpassword" id="newpassword" placeholder="Senha Nova" class="mt-3 block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">                
              </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button wire:click="changePassword" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Confirmar</button>
            <button onclick="closeModalPassword()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
          </div>
        </div>
    </div>

    <!-- Change Picture -->
    <div class="modalpic hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                  <i class="fa fa-image text-blue-600"></i>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Imagem de Perfil</h3>
                <div class="">
                  <p class="text-sm text-gray-500 mb-3">Envie sua nova foto de perfil abaixo.<p>
                    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="flex items-center">
                        <label for="file-upload" class="cursor-pointer text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">
                            Upload Image
                        </label>
                        <input id="file-upload" type="file" name="image" multiple  required class="hidden" />
                    </div>
                         
              </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Confirmar</button>  
          </form>
          <button onclick="closeModalPic()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
          </div>
        </div>
    </div>
    
      <!-- 2FA -->
      <div class="modal hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
      @if (auth()->user()->two_factor_secret == NULL)
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                    <i class="fa fa-lock text-green-600"></i>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Ativar autenticação em duas etapas</h3>
                  <div class="mt-2">
                    <div class="flex justify-center">
                        <img src="{{ $qrCodeURL }}">
                    </div>
                    <p class="text-sm text-gray-500 mt-3">Basta escanear o Qr Code acima e informar o código abaixo.</p>
                    <input wire:model="verifycode" type="number" name="verifycode" id="verifycode" min="0" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">                
                </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button wire:click="verifyCode" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Ativar</button>
              <button onclick="closeModal()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
            </div>
          </div>
        @else
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <i class="fa fa-unlock text-red-600"></i>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Remover autenticação em duas etapas</h3>
                  <div class="mt-2">
                    
                    <p class="text-sm text-gray-500 mb-3">Insira o código que é informado no Autenticador para remover.</p>
                    <input wire:model="verifycode" type="number" name="verifycode" id="verifycode" min="0" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">                
                </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button wire:click="removetwofa" type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Remover</button>
              <button onclick="closeModal()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
            </div>
          </div>
       

        @endif
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
        .modalp {
          display: none;
          /* Additional styles for modal */
        }

        .modalp.open {
          display: flex;
          animation: fadeIn 0.3s ease-in-out;
        }

        .modalp.closing {
          animation: fadeOut 0.3s ease-in-out;
        }

        .modalpic.open {
          display: flex;
          animation: fadeIn 0.3s ease-in-out;
        }

        .modalpic.closing {
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
        function openModal() {
          const modal = document.querySelector('.modal');
          modal.classList.add('open');
        }

        function openModalPassword() {
          const modal = document.querySelector('.modalp');
          modal.classList.add('open');
        }

        function closeModalPassword() {
          const modal = document.querySelector('.modalp');
          modal.classList.remove('open');
          modal.classList.add('closing');
        
          setTimeout(() => {
            modal.classList.remove('closing');
            modal.classList.add('hidden'); // Add this line to hide the modal after the animation
          }, 300); // Adjust the timeout duration as needed
        }

        function openModalPic() {
          const modal = document.querySelector('.modalpic');
          modal.classList.add('open');
        }

        function closeModalPic() {
          const modal = document.querySelector('.modalpic');
          modal.classList.remove('open');
          modal.classList.add('closing');
        
          setTimeout(() => {
            modal.classList.remove('closing');
            modal.classList.add('hidden'); // Add this line to hide the modal after the animation
          }, 300); // Adjust the timeout duration as needed
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
