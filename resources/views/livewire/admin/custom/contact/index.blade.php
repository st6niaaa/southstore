<div class="font-family p-2">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <h1 class="text-2xl font-bold text-blue-700 mb-3">Contato</h1>
    <div class="bg-white h-full p-3 rounded-lg flex flex-col sm:flex-row">
        <div class="relative w-full">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mt-2">
                            <div wire:ignore class="bg-white">
                                <div id="editor">{!! $text !!}</div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button wire:click="save" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Salvar</button>
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
        quill.root.innerHTML = {!! json_encode($text) !!}; 
    
        quill.on('text-change', function() {
            @this.set('text', quill.root.innerHTML); 
        });
    </script>
</div>
