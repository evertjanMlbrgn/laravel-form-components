<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('check the right element as default', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->seeElement('input[value="a"]:checked')
        ->seeElement('input[value="b"]:not(:checked)');
});

it('check checkbox labels work', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->seeElement('input[value="a"] ~ label')
        ->seeElement('input[value="b"] ~ label');
});

it('Assert checkbox labels contain correct classes"', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->seeElement('input[value="a"] ~ label.form-check-label')
        ->seeElement('input[value="b"] ~ label.form-check-label');
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
        ->seeElement('button[type="submit"]')
        ->seeElement('input[value="a"]:not(:checked)')
        ->seeElement('input[value="b"]:checked')
        ->press('Send')
        ->seeElement('input[value="a"]:not(:checked)')
        ->seeElement('input[value="b"]:checked');
});

it('always has an id attribute', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->seeElement('input[value="a"][id]')
        ->seeElement('input[value="b"][id]');
});

it('does not render label when checkbox is hidden', function () {
//    $this->registerTestRoute('bootstrap-inputs');
//
//    $this->visit('/bootstrap-inputs')
//        ->within('#form-6', function() {
//            return $this->dontSeeElement('label[for="checkbox"]')
//                ->dontSeeElement('label[for="color"]');
//        });
})->todo();

