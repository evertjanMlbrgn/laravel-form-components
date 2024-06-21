<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('adds help text', function () {
    $this->registerTestRoute('bootstrap-help');

    $this->visit('/bootstrap-help')
        ->seeInElement('.form-text', 'Your username must be 8-20 characters long.');
});

// tests if setting uses-custom-validation adds class needs-validation to form and attribute no-validate
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
