<div class="font-family p-2">
 <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
 <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
 <h1 class="text-2xl font-bold text-blue-700 mb-3">Novo Produto</h1>
    <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
        <div class="relative w-full">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                        <div class="mt-2">
                            <input wire:model="name" type="text" placeholder="iPhone 15 128GB Azul" name="name" id="name" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Categoria</label>
                        <div class="mt-2">
                            <select wire:model="category" id="small" class="block w-full px-3 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                <option selected>Escolha uma categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Preço</label>
                        <div class="mt-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-900">R$</span>
                                <input wire:model="price" type="number" placeholder="5650" min="0" name="price" id="price" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Descrição</label>
                    <div key="product-form" class="mt-2">
                        <div wire:ignore>
                            <div id="editor">{!! $description !!}</div>
                        </div>
                    </div> 
                </div>
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Imagem</label>
                        <div class="mt-2">
                            <input wire:model="image" type="text" placeholder="link aqui..." name="image" id="image" class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Valor Pago</label>
                        <div class="mt-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-900">R$</span>
                                <input wire:model="bought_value" type="number" placeholder="2000" min="0" name="bought" id="bought_value" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">IMEI</label>
                        <div class="mt-2">
                            <div class="flex items-center space-x-2">
                                <input wire:model="imei" type="text" placeholder="356303485030785" name="imei" id="imei" class="block w-full max-w-xs px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button wire:click="createProduct" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
            </div>
        </div>
    </div>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    // Initialize with existing content if available
    quill.root.innerHTML = {!! json_encode($description) !!}; 

    quill.on('text-change', function() {
        @this.set('description', quill.root.innerHTML); 
    });
</script>
    
</div>
