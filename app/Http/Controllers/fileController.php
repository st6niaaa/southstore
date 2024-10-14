<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\ZipUncompress;
use App\Services\NotificationService;
use App\Models\Products;

class fileController extends Controller
{
    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'image' => 'required|file|mimes:zip|max:2048',
        ]);

        $image = $request->file('image');
        $userId = auth()->user()->id;
        $productId = $request->input('id');
        $productinfo = Products::findOrFail($productId);

        $imageName = $productId . '.' . 'zip';

        $destinationPath = 'img/products/' . $productId;

        $image->move($destinationPath, $imageName);

        $notificationService = new NotificationService();
        $zipUncompressController = new ZipUncompress();
        $zipUncompressController->descompactarZip('img/products/' . $productId . '/' . $imageName, 'img/products/' . $productId);

        $notificationService->notify("success", "Visualização 3D aplicada com sucesso ao produto '" . $productinfo->name . "'", 3000);
        
        // Redirect back to admin.products route
        return redirect()->route('admin.products')->with('success', 'Image uploaded and uncompressed successfully!'); 
    }

    public function uploadtwo(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'image' => 'required|file|mimes:zip|max:2048',
        ]);

        $image = $request->file('image');
        $userId = auth()->user()->id;
        $productId = $request->input('id');
        $productinfo = Products::findOrFail($productId);

        $imageName = $productId . '.' . 'zip';

        $destinationPath = 'img/photos/' . $productId;

        $image->move($destinationPath, $imageName);

        $notificationService = new NotificationService();
        $zipUncompressController = new ZipUncompress();
        $zipUncompressController->descompactarZip('img/photos/' . $productId . '/' . $imageName, 'img/photos/' . $productId);

        $notificationService->notify("success", "Fotos anexadas ao produto '" . $productinfo->name . "'", 3000);
        
        // Redirect back to admin.products route
        return redirect()->route('admin.products')->with('success', 'Image uploaded and uncompressed successfully!'); 
    }
}