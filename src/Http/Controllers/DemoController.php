<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Mlbrgn\LaravelFormComponents\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

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
                ],
            ],
        ]);
    }
}
