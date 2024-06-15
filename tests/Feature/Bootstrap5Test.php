<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
beforeEach(function () {
    if (config('form-components.framework') !== 'bootstrap-5') {
        $this->markTestSkipped('Other framework configured');
    }
});

it('groups elements with input-group', function () {
    $this->registerTestRoute('bootstrap-input-group');

    $this->visit('/bootstrap-input-group')
        ->within('.input-group', function () {
            return $this->seeElementCount('.form-control', 2)
                ->seeElementCount('.input-group-text', 1)
                ->seeInElement('.input-group-text', '@');
        });
});

it('floats labels', function () {
    $this->registerTestRoute('bootstrap-floating-label');

    $this->visit('/bootstrap-floating-label')
        ->seeElementCount('label', 2)
        ->seeInElement('label', 'Your Name')
        ->seeElement('#name1', ['placeholder' => ' '])
        ->seeElement('#name2', ['placeholder' => 'John Doe']);
});

it('adds custom input classes', function () {
    $this->registerTestRoute('bootstrap-custom-input');

    $this->visit('/bootstrap-custom-input')
        ->seeElement('.form-control-color', ['value' => '#000000'])
        ->seeElementCount('.form-switch', 1) // fails
        ->seeElement('.form-range', ['type' => 'range']);
});

it('shows required asterisk when field required', function () {
    $this->registerTestRoute('bootstrap-required');

    $this->visit('/bootstrap-required')
        ->seeElement('div.input-required label.required')
        ->seeElement('div.input-not-required label');
    //        ->seeElementCount('.form-switch', 1) // fails
    //        ->seeElement('.form-range', ['type' => 'range']);
});

// TODO move to custom bootstrap test file
// tests if setting has-custom-client-side-validation adds class needs-validation to form and attribute no-validate
// also tests if input-groups get the class has-validation (needed to fix rounded borders on input-groups with
// validation
it('handles "has-custom-client-side-validation', function () {
    $this->registerTestRoute('bootstrap-form-client-side-validation');

    $this->visit('/bootstrap-form-client-side-validation')
        ->assertResponseOk()
        ->seeElement('form.needs-validation')
        ->seeElement('form[novalidate]')
        ->seeElement('div.input-group.has-validation')
        ->seeElement('div.input-group-2.has-validation');
});

// TODO move to custom bootstrap test file
// tests if setting has-custom-client-side-validation adds class needs-validation to form and attribute no-validate
// also tests if input-groups get the class has-validation (needed to fix rounded borders on input-groups with
// validation
it('adds aria-describedby to control with help text', function () {
    $this->registerTestRoute('bootstrap-form-help-aria-describedby');

    $this->visit('/bootstrap-form-help-aria-describedby')
        ->assertResponseOk()
        ->seeElement('input#input[aria-describedby="input-help-text"]')
        ->seeElement('input#input ~ div[id="input-help-text"]')

        ->seeElement('select#select[aria-describedby="select-help-text"]')
        ->seeElement('input#input ~ div[id="select-help-text"]')

        ->seeElement('textarea#textarea[aria-describedby="textarea-help-text"]')
        ->seeElement('input#input ~ div[id="textarea-help-text"]')

        ->seeElement('input#checkbox[aria-describedby="checkbox-help-text"]')
        ->seeElement('input#checkbox ~ div[id="checkbox-help-text"]')

        ->seeElement('input#radio[aria-describedby="radio-help-text"]')
        ->seeElement('input#radio ~ div[id="radio-help-text"]');
});

it('adds javascript when using attribute "has-client-side-validation"', function() {

})->todo();

it('accepts "classes-label" and "classes-control" on controls"', function() {

})->todo();
