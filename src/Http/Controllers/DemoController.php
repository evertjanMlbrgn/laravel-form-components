<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Mlbrgn\LaravelFormComponents\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Routing\Controller;

class DemoController extends Controller
{
    public function demo(): View
    {
        return view('form::preview.form-components-preview', [
            'assetConfig' => [
                'assets' => [
                    'validation' => true,
                    'htmlEditor' => true,
                    'preview' => true,
                ]
            ]
        ]);
    }
}
