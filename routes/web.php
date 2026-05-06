<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Mlbrgn\LaravelFormComponents\Http\Controllers\DemoController;
use Mlbrgn\LaravelFormComponents\Http\Controllers\UploadController;

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

/*
 * if (config('media-library-extensions.demo_pages_enabled')) {
    Route::group([
        'middleware' => array_merge(
            config('media-library-extensions.route_middleware'),
            [UseDemoModeConnection::class]
        ),
        'prefix' => config('media-library-extensions.route_prefix'),
    ], function () {
        // Local route model binding
        Route::bind('media', fn ($value) => Media::findOrFail($value));

        Route::controller(DemoController::class)->group(function () {
            Route::get('mle-demo-plain', 'demoPlain')->name('mle-demo-plain');
            Route::get('mle-demo-bootstrap-5', 'demoBootstrap5')->name('mle-demo-bootstrap-5');
        });

        Route::get('favicon.ico', function () {
            $path = __DIR__.'/../resources/assets/favicon.ico';

            if (! file_exists($path)) {
                abort(404);
            }

            return Response::file($path, [
                'Content-Type' => 'image/x-icon',
                'Cache-Control' => 'public, max-age=31536000', // cache for 1 year
            ]);
        })->name('mle.favicon');
    });
}
 */
Route::middleware(['web'])->group(function () {

    Route::get('form-components-preview', [DemoController::class, 'demo']);

    Route::post('form-upload-media', [UploadController::class, 'upload']);

    Route::get('mlbrgn-mfc/favicon.ico', function () {
        $path = __DIR__.'/../resources/assets/favicon.ico';

        if (! file_exists($path)) {
            abort(404);
        }

        return Response::file($path, [
            'Content-Type' => 'image/x-icon',
            'Cache-Control' => 'public, max-age=31536000', // cache for 1 year
        ]);
    })->name('mlbrgn.lfc.favicon');

});
