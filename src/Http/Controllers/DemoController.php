<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Mlbrgn\LaravelFormComponents\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'submittedData' => session('submitted_data'),
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {
        if ($request->has('should_validate')) {
            $request->validate([
                'reg_email' => 'required|email',
                'reg_password' => 'required|min:8',
                'reg_city' => 'required',
                'reg_state' => 'required',
                'reg_zip' => 'required',
                'reg_check' => 'accepted',
            ]);
        }

        return redirect()->back()->with('submitted_data', $request->all());
    }

    protected function getSections(): array
    {
        return [
            ['id' => 'form-overview', 'title' => 'Overview'],
            ['id' => 'form-controls', 'title' => 'Form controls'],
            ['id' => 'form-html-editor', 'title' => 'HTML Editor'],
            ['id' => 'form-buttons', 'title' => 'Buttons'],
            ['id' => 'form-select', 'title' => 'Select'],
            ['id' => 'form-checks-and-radios', 'title' => 'Checks and radios'],
            ['id' => 'form-range', 'title' => 'Range'],
            ['id' => 'form-input-group', 'title' => 'Input group'],
            ['id' => 'form-floating-label', 'title' => 'Floating labels'],
            ['id' => 'form-layout', 'title' => 'Layout'],
            ['id' => 'form-group', 'title' => 'Form Group'],
            ['id' => 'form-validation', 'title' => 'Validation'],
            ['id' => 'form-precedence', 'title' => 'Binding & Precedence'],
            ['id' => 'form-real-world', 'title' => 'Real world example'],
            ['id' => 'form-custom-tests', 'title' => 'Custom tests'],
        ];
    }
}
