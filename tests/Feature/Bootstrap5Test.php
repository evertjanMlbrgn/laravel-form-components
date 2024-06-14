<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
beforeEach(function () {
    if (config('form-components.framework') !== 'bootstrap-5') {
        $this->markTestSkipped('Other framework configured');
    }
});

it('can group elements', function () {
    $this->registerTestRoute('bootstrap-input-group');

    $this->visit('/bootstrap-input-group')
        ->within('.input-group', function () {
            return $this->seeElementCount('.form-control', 2)
                ->seeElementCount('.input-group-text', 1)
                ->seeInElement('.input-group-text', '@');
        });
});

it('can float labels', function () {
    $this->registerTestRoute('bootstrap-floating-label');

    $this->visit('/bootstrap-floating-label')
        ->seeElementCount('label', 2)
        ->seeInElement('label', 'Your Name')
        ->seeElement('#name1', ['placeholder' => ' '])
        ->seeElement('#name2', ['placeholder' => 'John Doe']);
});

it('can add custom input classes', function () {
    $this->registerTestRoute('bootstrap-custom-input');

    $this->visit('/bootstrap-custom-input')
        ->seeElement('.form-control-color', ['value' => '#000000'])
        ->seeElementCount('.form-switch', 1) // fails
        ->seeElement('.form-range', ['type' => 'range']);
});

it('does show required asterisk when field required', function () {
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

it('adds javascript when using attribute "has-client-side-validation"', function() {

})->todo();

it('accepts "classes-label" and "classes-control" on controls"', function() {

})->todo();
