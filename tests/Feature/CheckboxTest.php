<?php /** @noinspection Annotator */

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('checkbox-no-id');

    $this->visit('/checkbox-no-id')
        ->seeElement('input[value="a"][id]')
                ->seeElement('input[value="b"][id]');
});

it('sets classes', function () {
    $this->registerTestRoute('checkbox-classes');
    $this->visit('/checkbox-classes')
       ->seeElement('div.form-check input.form-check-input');
});

it('sets extra attributes', function () {
    $this->registerTestRoute('checkbox-extra-attributes');
    $this->visit('/checkbox-extra-attributes')
       ->seeElement('input[name="checkbox"][readonly][disabled]');
});

it('sets extra classes', function () {
    $this->registerTestRoute('checkbox-extra-classes');
    $this->visit('/checkbox-extra-classes')
       ->seeElement('input[name="checkbox"].extra-1.extra-2.form-control-lg');
});

it('sets a default value', function () {
    $this->registerTestRoute('checkbox-default');

    $this->visit('/checkbox-default')
       ->seeElement('input[name="checkbox"]:checked');
});

it('does not render label when hidden', function () {
    $this->registerTestRoute('checkbox-hidden');

    $this->visit('/checkbox-hidden')
        ->dontSeeElement('label[for="hidden-checkbox"]')
                ->seeElement('label[for="non-hidden-checkbox"]');
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('checkbox-wrapper-classes');

    $this->visit('/checkbox-wrapper-classes')
       ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="checkbox"].form-control-lg.some-other-class');
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('checkbox-wrapper-classes');

    $this->visit('/checkbox-wrapper-classes')
       ->seeElement('input[name="checkbox"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
    Config::set('form-components.use_wrapper_classes', true);
});

// TODO why doesn't this work when validate contains checkbox-validation?
it('uses old value after submit', function () {
    $this->registerTestRoute('checkbox-validation-old-value', function (Request $request) {
        $request->validate([
            'checkbox-validation' => 'nullable',
            'other' => 'required', // ← force failure
        ]);
    });

    $this->visit('/checkbox-validation-old-value')
        ->check('checkbox-validation', '1')
        ->press('Send')
        ->followRedirects()
        ->seeElement('input[name="checkbox-validation"]:checked');
});

it('shows a validation error', function () {
    $this->registerTestRoute('checkbox-validation-error', function (Request $request) {
        $request->validate([
            'checkbox' => 'required',
        ]);
    });

    $this->visit('/checkbox-validation-error')
        ->press('Send')
                ->seeElement('input[name="checkbox"]')
                        ->seeElement('input[name="checkbox"] ~ div.invalid-feedback')
                        ->seeInElement('input[name="checkbox"] ~ div.invalid-feedback', 'The checkbox field is required');
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('checkbox-help-text');

    $this->visit('/checkbox-help-text')
        ->seeElement('div.form-text[id="checkbox-help-text"]')
                ->seeInElement('div.form-text[id="checkbox-help-text"]', 'attribute help text');
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('checkbox-help-slot');

    $this->visit('/checkbox-help-slot')
        ->seeElement('div.form-text[id="checkbox-help-text"]')
                ->seeInElement('div.form-text[id="checkbox-help-text"]', 'slot help text');
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('checkbox-no-help');

    $this->visit('/checkbox-no-help')
        ->dontSeeElement('div[id="checkbox-help-text"]');
});

it('does not have help text when hidden', function () {
    $this->registerTestRoute('checkbox-hidden');

    $this->visit('/checkbox-hidden')
        ->seeElement('input[type="checkbox"]') // always make sure node list is not empty when only using dontSeeElement
                ->dontSeeElement('div.form-text[id="hidden-checkbox-help-text"]')
                ->seeElement('div.form-text[id="non-hidden-checkbox-help-text"]')
                ->seeInElement('div.form-text[id="non-hidden-checkbox-help-text"]', 'help text');
});

// TODO other name
it('check the right element as default', function () {
    $this->registerTestRoute('checkbox-no-id');

    $this->visit('/checkbox-no-id')
        ->seeElement('input[value="a"]:checked')
                ->seeElement('input[value="b"]:not(:checked)');
});

// TODO other name
it('check checkbox labels work', function () {
    $this->registerTestRoute('checkbox-no-id');

    $this->visit('/checkbox-no-id')
        ->seeElement('input[value="a"] ~ label')
                ->seeElement('input[value="b"] ~ label');
});

it('has correct classes on label', function () {
    $this->registerTestRoute('checkbox-no-id');

    $this->visit('/checkbox-no-id')
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

it('supports "defaults-to-zero" attribute', function () {
    $this->registerTestRoute('checkbox-default-to-zero');

    $this->visit('/checkbox-default-to-zero')
       ->seeElement('input[type="hidden"][name="checkbox-defaults-to-zero"][value="0"] ~ input[type="checkbox"][name="checkbox-defaults-to-zero"]')
                ->seeElement('input[type="checkbox"][name="checkbox-no-defaults-to-zero"]')
                ->dontSeeElement('input[type="hidden"][name="checkbox-no-defaults-to-zero"][value="0"]');
});
