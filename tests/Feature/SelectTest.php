<?php

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('select-no-id');

    $this->visit('/select-no-id')
        ->seeElement('select[id]');
});

it('sets classes', function () {
    $this->registerTestRoute('select-classes');

    // reusing form "form-type-attribute"
    $this->visit('select-classes')
       ->seeElement('select[name="select"].form-select');
});

it('sets extra attributes', function () {
    $this->registerTestRoute('select-extra-attributes');

    $this->visit('/select-extra-attributes')
       ->seeElement('select[name="select"][id="select"][readonly][disabled]:not([required])');
});

it('sets extra classes', function () {
    $this->registerTestRoute('select-extra-classes');

    $this->visit('/select-extra-classes')
        ->seeElement('select[name="select"].extra-1.extra-2.form-control-lg');
});

it('sets a default value', function () {
    $this->registerTestRoute('select-default');

    $this->visit('/select-default')
        ->seeElement('option[value="c"]:selected');
});

it('does not render label when hidden', function () {
    $this->registerTestRoute('select-hidden');

    $this->visit('/select-hidden')
        ->dontSeeElement('label[for="hidden-select"]')
                ->seeElement('label[for="non-hidden-select"]');
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('select-wrapper-classes');

    $this->visit('/select-wrapper-classes')
        ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 select[name="select"].form-control-lg.some-other-class');
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('select-wrapper-classes');

    $this->visit('/select-wrapper-classes')
       ->seeElement('select[name="select"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');

    Config::set('form-components.use_wrapper_classes', true);

});

it('uses old value after submit', function () {
    $this->registerTestRoute('select-validation', function (Request $request) {
        $request->validate([
            'select' => 'required|in:0,1',
        ]);
    });

    $this->visit('/select-validation')
        ->select('2', 'select')
                ->press('Send')
                ->seeElement('option[value="0"]:not(:selected)')
                        ->seeElement('option[value="1"]:not(:selected)')
                        ->seeElement('option[value="2"]:selected');
});

it('shows a validation error', function () {
    $this->registerTestRoute('select-validation-error', function (Request $request) {
        $request->validate([
            'select' => 'required|in:0,1',
        ]);
    });

    $this->visit('/select-validation-error')
        ->press('Send')
                ->seeElement('option[value="a"]:not(:selected)')
                        ->seeElement('option[value="b"]:not(:selected)')
                        ->seeElement('option[value="c"]:not(:selected)')
                        ->seeElement('div.invalid-feedback')
                        ->seeInElement('div.invalid-feedback', 'The select field is required');
});

it('shows slot when no options attribute provided', function () {
    $this->registerTestRoute('select-options-using-slot');

    $this->visit('/select-options-using-slot')
        ->seeElement('option[value="a"]')
                ->seeElement('option[value="b"]')
                ->seeElement('option[value="c"]');
});

it('can render a placeholder', function () {
    $this->registerTestRoute('select-placeholder');

    $this->visit('/select-placeholder')
        ->seeElement('option[value=""][selected="selected"]')
                ->seeElement('option[value="a"]')
                ->seeElement('option[value="b"]');
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('select-help-text');

    $this->visit('/select-help-text')
       ->seeElement('div.form-text[id="select-help-text"]')
        ->seeInElement('div.form-text[id="select-help-text"]', 'attribute help text');
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('select-help-slot');

    $this->visit('/select-help-slot')
       ->seeElement('div.form-text[id="select-help-text"]')
                ->seeInElement('div.form-text[id="select-help-text"]', 'slot help text');
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('select-no-help');

    $this->visit('/select-no-help')
       ->seeElement('select')// always make sure node list is not empty when only using dontSeeElement
                ->dontSeeElement('div.form-text');
});

it('does not have help text hidden', function () {
    $this->registerTestRoute('select-hidden');

    $this->visit('/select-hidden')
        ->seeElement('select') // always make sure node list is not empty when only using dontSeeElement
                ->dontSeeElement('div.form-text[id="hidden-select-help-text"]')
                ->seeElement('div.form-text[id="non-hidden-select-help-text"]')
                ->seeInElement('div.form-text[id="non-hidden-select-help-text"]', 'other help text');
});

it('selects a boolean value using bind', function () {
    $this->registerTestRoute('select-boolean');

    $this->visit('/select-boolean')
       ->seeElement('option[value="1"]')
                ->seeElement('option[value="0"][selected="selected"]');
});

it('makes the values numeric', function () {
    $this->registerTestRoute('select-no-keys', function (Request $request) {
        $request->validate([
            'select' => 'required|in:a,b',
        ]);
    });

    $this->visit('/select-no-keys')
        ->seeInElement('option[value="0"]', 'a')
                ->seeInElement('option[value="1"]', 'b')
                ->seeInElement('option[value="2"]', 'c');
});
