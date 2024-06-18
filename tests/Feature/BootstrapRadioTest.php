<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('check the right element as default', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->seeElement('input[value="1"]:checked')
        ->seeElement('input[value="0"]:not(:checked)');
});

it('check radio labels work', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->seeElement('input[value="1"] ~ label')
        ->seeElement('input[value="0"] ~ label');
});

it('sets correct classes on radio labels', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->seeElement('input[value="1"] ~ label.form-check-label')
        ->seeElement('input[value="0"] ~ label.form-check-label');
});

it('checks the right element as default with a bound target', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->seeElement('input[value="1"]:checked')
        ->seeElement('input[value="0"]:not(:checked)');
});

it('checks the right input element after a validation error', function () {
    $this->registerTestRoute('radio-validation', function (Request $request) {
        $data = $request->validate([
            'radio' => 'required|in:a',
        ]);
    });

    $this->visit('/radio-validation')
        ->select('b', 'radio')
        ->press('Send')
        ->seeElement('input[value="a"]:not(:checked)')
        ->seeElement('input[value="b"]:checked');
});

it('checks the right input element after a validation error of another field', function () {
    $this->registerTestRoute('radio-with-zero-value', function (Request $request) {
        $data = $request->validate([
            'input' => 'required',
        ]);
    });

    $this->visit('/radio-with-zero-value')
        ->select('0', 'radio')
        ->press('Send')
        ->seeElement('input[value="0"]:checked')
        ->seeElement('input[value="1"]:not(:checked)');
});

it('always has an id attribute', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->seeElement('input[value="1"][id]')
        ->seeElement('input[value="0"][id]');
});

it('does not render label when radio is hidden', function () {
//    $this->registerTestRoute('bootstrap-inputs');
//
//    $this->visit('/bootstrap-inputs')
//        ->within('#form-6', function() {
//            return $this->dontSeeElement('label[for="checkbox"]')
//                ->dontSeeElement('label[for="color"]');
//        });
})->todo();
