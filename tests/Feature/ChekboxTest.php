<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('check the right element as default', function () {
    $this->registerTestRoute('default-checkbox');

    $this->visit('/default-checkbox')
        ->seeElement('input[value="a"]:checked')
        ->seeElement('input[value="b"]:not(:checked)');
});

it('check checkbox labels work', function () {
    $this->registerTestRoute('default-checkbox');

    $this->visit('/default-checkbox')
        ->seeElement('input[value="a"] ~ label')
        ->seeElement('input[value="b"] ~ label');
});

it('Assert checkbox labels contain correct classes"', function () {
    $this->registerTestRoute('default-checkbox');

    $this->visit('/default-checkbox')
        ->seeElement('input[value="a"] ~ label.form-check-label')
        ->seeElement('input[value="b"] ~ label.form-check-label');
});

it('Assert checkbox labels do not contain "form-label" classes', function () {
    $this->registerTestRoute('default-checkbox');

    $this->visit('/default-checkbox')
        ->seeElement('input[value="a"] ~ label:not(.form-label)')
        ->seeElement('input[value="b"] ~ label:not(.form-label)');
});

it('supports bound collections', function () {
    $this->registerTestRoute('checkbox-collection');

    $this->visit('/checkbox-collection')
        ->seeElement('input[value="read"]:checked')
        ->seeElement('input[value="write"]:not(:checked)');
});

it('checks the right input element after a validation error', function () {
    $this->registerTestRoute('checkbox-validation', function (Request $request) {
        $request->validate([
            'checkbox' => 'required|array',
            'checkbox.*' => 'in:a',
        ]);
    });

    $this->visit('/checkbox-validation')
        ->seeElement('input[value="a"]:not(:checked)')
        ->seeElement('input[value="b"]:checked')
        ->press('Submit')
        ->seeElement('input[value="a"]:not(:checked)')
        ->seeElement('input[value="b"]:checked');
});
