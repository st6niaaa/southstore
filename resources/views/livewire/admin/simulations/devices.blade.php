<div class="font-family p-2">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-blue-700 mb-3">Calculadora de Aparelhos</h1>
        @if (auth()->user()->role == 'Dono')
            <a href="{{ route('manager.simulations.device')}}"><button class="text-sm bg-blue-600 border border-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">Listar Imperfeições</button></a>
        @endif
    </div>
    <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
        <div class="relative w-full">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Imperfeições</label>
                        <div class="mt-2">
                            <select multiple class="form-control block w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" id="items" wire:model="selectedItems">
                                @foreach ($breakdowns as $breakdown)
                                        <option value="{{ $breakdown->value }}">{{ $breakdown->name }}</option>
                                    @endforeach

                                </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Valor do Dispositivo</label>
                        <div class="mt-2">
                         <div class="flex items-center space-x-2">
                             <span class="text-gray-900">R$</span>
                             <input wire:model="payvalue" type="number" placeholder="1500" name="porcentagerate" id="porcentagerate" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                         </div>
                     </div>
                    </div>
                </div>
                <div class="mt-2 font-1xl">
                    @if ($this->finalpayvalue)
                        O valor dos custos de reparo é de R$<span class="font-semibold">{{ $this->sum }}</span>. E o valor total do produto será de R$<span class="font-semibold">{{ $this->finalpayvalue }}</span>.
                    @endif
                </div>
            </div>
            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button wire:click="calculateDevice" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Calcular</button>
            </div>
        </div>
    </div>
</div>