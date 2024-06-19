<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

// tests if setting uses-custom-validation adds class needs-validation to form and attribute no-validate
// also tests if input-groups get the class has-validation (needed to fix rounded borders on input-groups with
// validation
it('handles "uses-custom-validation', function () {
    $this->registerTestRoute('bootstrap-form-client-side-validation');

    $this->visit('/bootstrap-form-client-side-validation')
        ->assertResponseOk()
        ->seeElement('form.needs-validation')
        ->seeElement('form[novalidate]')
        ->seeElement('div.input-group.has-validation')
        ->seeElement('div.input-group-2.has-validation');
});

it('adds javascript when using attribute "uses-validation"', function() {

})->todo();
