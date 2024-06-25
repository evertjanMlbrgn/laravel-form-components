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
    Route::get('form-components-preview', function () {
        return view('preview::form-components-preview');
    });

    // Route to serve assets from the package's dist directory
    Route::get('package/assets/{name}', function ($name) {

        $allowedAssets = [
            'preview.css',
            'preview.js',
            'main.css',
            'main.js',
            'html-editor.js',
            'form-validation.js',
            'form-validation.css',
            'button-image.png'
        ];

        if (!in_array($name, $allowedAssets)) {
            abort(404);
        }

        switch($name) {
            case 'preview.css':
                $file = __DIR__ . '/../dist/css/mlbrgn-preview.css';
                break;
            case 'preview.js':
                $file = __DIR__ . '/../dist/js/mlbrgn-preview.js';
                break;
            case 'main.css':
                $file = __DIR__ . '/../dist/css/mlbrgn-form-components.css';
                break;
            case 'main.js':
                $file = __DIR__ . '/../dist/js/mlbrgn-form-components.js';
                break;
            case 'html-editor.js':
                $file = __DIR__ . '/../dist/js/mlbrgn-html-editor.js';
                break;
            case 'form-validation.js':
                $file = __DIR__ . '/../dist/js/mlbrgn-form-validation.js';
                break;
            case 'form-validation.css':
                $file = __DIR__ . '/../dist/css/mlbrgn-form-validation.css';
                break;
            case 'button-image.png':
                $file = __DIR__ . '/../public/images/button-image.png';
                break;
        }

        if (!isset($file)) {
            abort(404);
        }

        if (!File::exists($file)) {
            abort(404);
        }

        // Determine the MIME type based on the file extension
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
        ];

        // Fallback to File::mimeType if extension is not explicitly handled
        $mimeType = $mimeTypes[$extension] ?? File::mimeType($file);

        $content = File::get($file);

        return Response::make($content, 200, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=86400' // Cache for 1 day
        ]);
    })->where('path', '.*')->name('package.assets');

});


