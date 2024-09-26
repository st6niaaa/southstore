<div class="font-family p-2">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <h1 class="text-2xl font-bold text-blue-700 mb-3">Contato</h1>
    <div wire:ignore class="bg-white">
        <div id="editor">{!! $text !!}</div>
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
