<?php

namespace Mlbrgn\LaravelFormComponents\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the file
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,webp|max:20480',
        ]);

        // Store the uploaded file in the public storage
        $path = $request->file('file')->store('uploads', 'public');

        // Return the file URL for TinyMCE
        return response()->json(['url' => '/storage/' . $path]);
    }
}
