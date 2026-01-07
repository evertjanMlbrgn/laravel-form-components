<?php

use Illuminate\Support\Facades\Route;
use Mlbrgn\LaravelFormComponents\Http\Controllers\UploadController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

    Route::post('form-upload-media', [UploadController::class, 'upload']);
    // Route to serve assets from the package's dist directory
//    Route::get('package/assets/{name}', function ($name) {
//
//        $allowedAssets = [
//            'preview.css',
//            'preview.js',
//            'main.css',
//            'main.js',
//            'html-editor.js',
//            'form-validation.js',
//            'form-validation.css',
//            'button-image.png',
//            'icon-envelope.png',
//            'sprite.svg',
//        ];
//
//        if (! in_array($name, $allowedAssets)) {
//            abort(404);
//        }
//
//        switch ($name) {
//            case 'preview.css':
//                $file = __DIR__.'/../dist/css/mlbrgn-preview.css';
//                break;
//            case 'preview.js':
//                $file = __DIR__.'/../dist/js/mlbrgn-preview.js';
//                break;
//            case 'main.css':
//                $file = __DIR__.'/../dist/css/mlbrgn-form-components.css';
//                break;
//            case 'main.js':
//                $file = __DIR__.'/../dist/js/mlbrgn-form-components.js';
//                break;
//            case 'html-editor.js':
//                $file = __DIR__.'/../dist/js/mlbrgn-html-editor.js';
//                break;
//            case 'form-validation.js':
//                $file = __DIR__.'/../dist/js/mlbrgn-form-validation.js';
//                break;
//            case 'form-validation.css':
//                $file = __DIR__.'/../dist/css/mlbrgn-form-validation.css';
//                break;
//            case 'button-image.png':
//                $file = __DIR__.'/../public/images/button-image.png';
//                break;
//            case 'icon-envelope.png':
//                $file = __DIR__.'/../public/images/icon-envelope.png';
//                break;
//            case 'sprite.svg':
//                $file = __DIR__.'/../public/images/sprite.svg';
//                break;
//        }
//
//        if (! isset($file)) {
//            abort(404);
//        }
//
//        if (! File::exists($file)) {
//            abort(404);
//        }
//
//        // Determine the MIME type based on the file extension
//        $extension = pathinfo($file, PATHINFO_EXTENSION);
//        $mimeTypes = [
//            'css' => 'text/css',
//            'js' => 'application/javascript',
//        ];
//
//        // Fallback to File::mimeType if extension is not explicitly handled
//        $mimeType = $mimeTypes[$extension] ?? File::mimeType($file);
//
//        $content = File::get($file);
//
//        return Response::make($content, 200, [
//            'Content-Type' => $mimeType,
//            'Cache-Control' => 'public, max-age=86400', // Cache for 1 day
//        ]);
//    })->where('path', '.*')->name('package.assets');

//    Route::get('package/assets/{name}', function ($name) {
//
//        $allowedAssets = [
//            'preview.css',
//            'preview.js',
//            'main.css',
//            'main.js',
//            'html-editor.js',
//            'form-validation.js',
//            'form-validation.css',
//            'button-image.png',
//            'icon-envelope.png',
//            'sprite.svg',
//        ];
//
//        if (! in_array($name, $allowedAssets, true)) {
//            abort(404);
//        }
//
//        // Anchor paths to Laravel base path (open_basedir safe)
//        $base = base_path('vendor/mlbrgn/laravel-form-components');
//
//        $map = [
//            'preview.css'          => $base . '/dist/css/mlbrgn-preview.css',
//            'preview.js'           => $base . '/dist/js/mlbrgn-preview.js',
//            'main.css'             => $base . '/dist/css/index.css',
//            'main.js'              => $base . '/dist/js/index.js',
//            'html-editor.js'       => $base . '/dist/js/mlbrgn-html-editor.js',
//            'form-validation.js'   => $base . '/dist/js/mlbrgn-form-validation.js',
//            'form-validation.css'  => $base . '/dist/css/mlbrgn-form-validation.css',
//            'button-image.png'     => $base . '/public/images/button-image.png',
//            'icon-envelope.png'    => $base . '/public/images/icon-envelope.png',
//            'sprite.svg'           => $base . '/public/images/sprite.svg',
//        ];
//
//        $file = $map[$name] ?? null;
//
//        if (! $file || ! is_file($file)) {
//            abort(404);
//        }
//
//        $extension = pathinfo($file, PATHINFO_EXTENSION);
//
//        $mimeTypes = [
//            'css' => 'text/css; charset=utf-8',
//            'js'  => 'application/javascript',
//            'png' => 'image/png',
//            'svg' => 'image/svg+xml',
//        ];
//
//        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
//
//        return Response::make(File::get($file), 200, [
//            'Content-Type'  => $mimeType,
//            'Cache-Control' => 'public, max-age=86400',
//        ]);
//    })->name('package.assets');

});
