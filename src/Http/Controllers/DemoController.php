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
            'sections' => $this->getSections(),
            'selectOptions' => [
                'be' => 'Belgium',
                'nl' => 'The Netherlands',
                'de' => 'Germany',
                'fr' => 'France',
            ],
        ]);
    }

    protected function getSections(): array
    {
        return [
            ['id' => 'form-overview', 'title' => 'Overview'],
            ['id' => 'form-controls', 'title' => 'Form controls'],
            ['id' => 'form-select', 'title' => 'Select'],
            ['id' => 'form-checks-and-radios', 'title' => 'Checks and radios'],
            ['id' => 'form-range', 'title' => 'Range'],
            ['id' => 'form-input-group', 'title' => 'Input group'],
            ['id' => 'form-floating-label', 'title' => 'Floating labels'],
            ['id' => 'form-layout', 'title' => 'Layout'],
            ['id' => 'form-validation', 'title' => 'Validation'],
            ['id' => 'form-real-world', 'title' => 'Real world example'],
            ['id' => 'form-custom-tests', 'title' => 'Custom tests'],
        ];
    }
}
