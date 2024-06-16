<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('sets correct classes on toggle checkboxes and radios', function () {
    $this->registerTestRoute('checkbox-radio-toggles');

    $this->visit('/checkbox-radio-toggles')
        ->seeElement('input[value="a"].btn-check')
        ->seeElement('input[value="0"].btn-check')
        ->seeElement('input[value="a"] ~ label.btn')
        ->seeElement('input[value="0"] ~ label.btn');
});

it('does not set class "form-check-label" on toggle checkboxes and radios', function () {
    $this->registerTestRoute('checkbox-radio-toggles');

    $this->visit('/checkbox-radio-toggles')
        ->seeElement('input[value="a"] ~ label:not(.form-check-label)')
        ->seeElement('input[value="0"] ~ label:not(.form-check-label)');
});

it('does not use wrapper on toggle checkboxes and radios', function () {
    $this->registerTestRoute('checkbox-radio-toggles');

    $this->visit('/checkbox-radio-toggles')
        ->dontSeeElement('div.form-check');
});
