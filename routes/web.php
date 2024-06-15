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
//    return view('form-components-test');
//    return 'hello form-components';
        return view('test-views::form-components-test');
    });

    Route::get('package/assets/{path}', function ($path) {
        $file = __DIR__ . '/../dist/' . $path;

        if (!File::exists($file)) {
            abort(404);
        }

        $mimeType = File::mimeType($file);
        $content = File::get($file);

        return Response::make($content, 200, ['Content-Type' => $mimeType]);
    })->where('path', '.*')->name('package.assets');
});


