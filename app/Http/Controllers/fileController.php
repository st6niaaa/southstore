<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileController extends Controller
{
    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|file|mimes:zip|max:2048',
        ]);

        $image = $request->file('image');
        $userId = auth()->user()->id;

        $imageName = $userId . '.' . 'zip';

        $destinationPath = 'img/profiles/';

        $image->move($destinationPath, $imageName);

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
}
