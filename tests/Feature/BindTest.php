<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('can bind a target to the form', function () {
    $this->registerTestRoute('bind-target');

    $this->visit('/bind-target')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'b')
        ->seeElement('option[value="c"]:selected')
        ->seeElement('select[multiple]')
        ->seeElement('option[value="d"]:selected')
        ->seeElement('option[value="e"]:selected')
        ->seeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});

it('sets the right value if the value is zero', function () {
    $this->registerTestRoute('bind-target-zero-value');

    $this->visit('/bind-target-zero-value')
        ->seeElement('input[name="input"][value="0"]');
});

it('overrides the bound target with the old request data', function () {
    $this->registerTestRoute('bound-with-validation-errors', function (Request $request) {
        $request->validate([
            'input'    => 'required',
            'textarea' => 'required',
            'select'   => 'required',
            'checkbox' => 'required',
            'radio'    => 'required',
        ]);
    });

    $this->visit('/bound-with-validation-errors')
        ->type('d', 'input')
        ->type('e', 'textarea')
        ->select('f', 'select')
        ->uncheck('checkbox')
        ->check('radio')
        ->press('Submit')
        ->seeElement('input[name="input"][value="d"]')
        ->seeInElement('textarea[name="textarea"]', 'e')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});

it('handles old nested data', function () {
    $this->registerTestRoute('nested-validation-errors', function (Request $request) {
        $request->validate([
            'input.nested'    => 'required',
            'textarea.nested' => 'required',
            'select.nested'   => 'required',
            'checkbox.nested' => 'required',
            'radio.nested'    => 'required',
        ]);
    });

    $this->visit('/nested-validation-errors')
        ->type('d', 'input[nested]')
        ->type('e', 'textarea[nested]')
        ->select('f', 'select[nested]')
        ->uncheck('checkbox[nested]')
        ->check('radio[nested]')
        ->press('Submit')
        ->seeElement('input[name="input[nested]"][value="d"]')
        ->seeInElement('textarea[name="textarea[nested]"]', 'e')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox[nested]"]')
        ->dontSeeElement('input[name="checkbox[nested]"]:checked')
        ->seeElement('input[name="radio[nested]"]:checked');
});

it('overrides the default value', function () {
    $this->registerTestRoute('default-values-with-bound-target');

    $this->visit('/default-values-with-bound-target')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'b')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]')
        ->dontSeeElement('input[name="radio"]:checked');
});

it('overrides the default value when nested', function () {
    $this->registerTestRoute('default-values-with-nested-bound-target');

    $this->visit('/default-values-with-nested-bound-target')
        ->seeElement('input[name="nested[input]"][value="a"]')
        ->seeInElement('textarea[name="nested[textarea]"]', 'b')
        ->seeElement('select[name="nested[select]"] > option[value="f"]:selected')
        ->seeElement('input[name="nested[checkbox]"]')
        ->dontSeeElement('input[name="nested[checkbox]"]:checked')
        ->seeElement('input[name="nested[radio]"]')
        ->dontSeeElement('input[name="nested[radio]"]:checked');
});

it('can bind two targets to the form', function () {
    $this->registerTestRoute('bind-two-targets');

    $this->visit('/bind-two-targets')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'e')
        ->dontSeeElement('option[value="c"]:selected')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});

it('can override the global bind with a bind per element', function () {
    $this->registerTestRoute('override-bind');

    $this->visit('/override-bind')
        ->seeElement('input[name="input"][value="d"]')
        ->seeInElement('textarea[name="textarea"]', 'e')
        ->seeElement('option[value="f"]:selected')
        ->seeElement('input[name="checkbox"]')
        ->dontSeeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]')
        ->dontSeeElement('input[name="radio"]:checked');
});

it('can disable a global bind per element', function () {
    $this->registerTestRoute('undo-bind');

    $this->visit('/undo-bind')
        ->seeElement('input[name="input"][value="a"]')
        ->dontSeeInElement('textarea[name="textarea"]', 'b');
});
