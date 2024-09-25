<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|file|mimes:png,jpg,jpeg,zip|max:2048',
        ]);

        $image = $request->file('image');
        $userId = auth()->user()->id; // Assuming you have authentication set up

        // Use the user ID as the image filename
        $imageName = $userId . '.' . 'png';

        // Set the destination path directly within the 'img/profiles' directory
        $destinationPath = 'img/profiles/';

        // Move the uploaded image to the destination path
        $image->move($destinationPath, $imageName);

        // Save the image path in the database (if needed)
        // ...

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
}