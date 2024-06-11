<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('shows the validation errors for each component', function () {
    $this->registerTestRoute('validation-errors', function (Request $request) {
        $request->validate([
            'input' => 'required',
            'textarea' => 'required',
            'select' => 'required',
            'checkbox' => 'required',
            'radio' => 'required',
        ]);
    });

    $this->visit('/validation-errors')
        ->press('Submit')
        ->seeText('The input field is required')
        ->seeText('The textarea field is required')
        ->seeText('The select field is required')
        ->seeText('The checkbox field is required')
        ->seeText('The radio field is required');
});

it('has an option to hide the validation errors', function () {
    $this->registerTestRoute('hidden-validation-errors', function (Request $request) {
        $request->validate([
            'input' => 'required',
            'textarea' => 'required',
            'select' => 'required',
            'checkbox' => 'required',
            'radio' => 'required',
        ]);
    });

    $this->visit('/hidden-validation-errors')
        ->press('Submit')
        ->dontSeeText('The input field is required')
        ->dontSeeText('The textarea field is required')
        ->dontSeeText('The select field is required')
        ->dontSeeText('The checkbox field is required')
        ->dontSeeText('The radio field is required');
});

it('uses the old values', function () {
    $this->registerTestRoute('validation-errors', function (Request $request) {
        $request->validate([
            'input' => 'required|in:d',
            'textarea' => 'required|in:d',
            'select' => 'required|in:d',
            'checkbox' => 'required',
            'radio' => 'required',
        ]);
    });

    $this->visit('/validation-errors')
        ->type('a', 'input')
        ->type('b', 'textarea')
        ->select('c', 'select')
        ->check('checkbox')
        ->check('radio')
        ->press('Submit')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'b')
        ->seeElement('option[value="c"]:selected')
        ->seeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});
