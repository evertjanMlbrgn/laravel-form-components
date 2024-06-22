<?php

use Illuminate\Http\Request;

it('check the right element as default', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-1', function() {
            $this->seeElement('input[value="a"]:checked')
                ->seeElement('input[value="b"]:not(:checked)');
        });
});

it('check checkbox labels work', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-1', function() {
            $this->seeElement('input[value="a"] ~ label')
                ->seeElement('input[value="b"] ~ label');
        });

});

it('Assert checkbox labels contain correct classes"', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-1', function() {
            $this->seeElement('input[value="a"] ~ label.form-check-label')
                ->seeElement('input[value="b"] ~ label.form-check-label');
        });

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
        ->within('#form-1', function() {
            $this->seeElement('input[value="a"][id]')
                ->seeElement('input[value="b"][id]');
        });
});

it('does not render label when checkbox is hidden', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-2', function() {
            return $this->dontSeeElement('label[for="hidden-checkbox"]')
                ->seeElement('label[for="non-hidden-checkbox"]');
        });
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-3', function() {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="checkbox"].form-control-lg.some-other-class');

        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-3', function() {
            $this->seeElement('input[name="checkbox"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

    Config::set('form-components.use_wrapper_classes', true);

});

it('sets a default value', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-default', function() {
            $this->seeElement('input[name="checkbox"]:checked');
        });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('bootstrap-checkbox');

    $this->visit('/bootstrap-checkbox')
        ->within('#form-3', function() {
            $this->dontSeeElement('div[id="checkbox-help-text"]');
        });
});
