<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::get('form-components-test', function () {
        return view('preview::form-components-preview');
    });

    // Route to serve assets from the package's dist directory
    Route::get('package/assets/{path}', function ($path) {
        $file = __DIR__ . '/../dist/' . $path;

        if (!File::exists($file)) {
            abort(404);
        }

        // Determine the MIME type based on the file extension
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            // Add other extensions and their MIME types as needed
        ];

        // Fallback to File::mimeType if extension is not explicitly handled
        $mimeType = $mimeTypes[$extension] ?? File::mimeType($file);

        $content = File::get($file);

        return Response::make($content, 200, ['Content-Type' => $mimeType]);
    })->where('path', '.*')->name('package.assets');
});


