<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('check the right element as default', function () {
    $this->registerTestRoute('default-radio');

    $this->visit('/default-radio')
        ->seeElement('input[value="1"]:checked')
        ->seeElement('input[value="0"]:not(:checked)');
});

it('check radio labels work', function () {
    $this->registerTestRoute('default-radio');

    $this->visit('/default-radio')
        ->seeElement('input[value="1"] ~ label')
        ->seeElement('input[value="0"] ~ label');
});

it('Assert radio labels contain correct classes"', function () {
    $this->registerTestRoute('default-radio');

    $this->visit('/default-radio')
        ->seeElement('input[value="1"] ~ label.form-check-label')
        ->seeElement('input[value="0"] ~ label.form-check-label');
});

it('Assert radio labels do not contain "form-label" classes"', function () {
    $this->registerTestRoute('default-radio');

    $this->visit('/default-radio')
        ->seeElement('input[value="1"] ~ label:not(.form-label)')
        ->seeElement('input[value="0"] ~ label:not(.form-label)');
})->todo();

it('check the right element as default with a bound target', function () {
    $this->registerTestRoute('default-radio-bind');

    $this->visit('/default-radio-bind')
        ->seeElement('input[value="a"]:checked')
        ->seeElement('input[value="b"]:not(:checked)');
});

it('does check the right input element after a validation error', function () {
    $this->registerTestRoute('radio-validation', function (Request $request) {
        $data = $request->validate([
            'radio' => 'required|in:a',
        ]);
    });

    $this->visit('/radio-validation')
        ->select('b', 'radio')
        ->press('Submit')
        ->seeElement('input[value="a"]:not(:checked)')
        ->seeElement('input[value="b"]:checked');
});

it('does check the right input element after a validation error of another field', function () {
    $this->registerTestRoute('radio-with-zero-value', function (Request $request) {
        $data = $request->validate([
            'input' => 'required',
        ]);
    });

    $this->visit('/radio-with-zero-value')
        ->select('0', 'radio')
        ->press('Submit')
        ->seeElement('input[value="0"]:checked')
        ->seeElement('input[value="1"]:not(:checked)');
});
