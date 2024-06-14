<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('checkboxes and radios contain correct classes when toggle', function () {
    $this->registerTestRoute('checkbox-radio-toggles');

    $this->visit('/checkbox-radio-toggles')
        ->seeElement('input[value="a"].btn-check')
        ->seeElement('input[value="0"].btn-check')
        ->seeElement('input[value="a"] ~ label.btn')
        ->seeElement('input[value="0"] ~ label.btn');
});

it('checkbox and radio labels do not contain "form-check-label" class when toggle', function () {
    $this->registerTestRoute('checkbox-radio-toggles');

    $this->visit('/checkbox-radio-toggles')
        ->seeElement('input[value="a"] ~ label:not(.form-check-label)')
        ->seeElement('input[value="0"] ~ label:not(.form-check-label)');
});

it('checkboxes and radios do not contain div wrapper when toggle', function () {
    $this->registerTestRoute('checkbox-radio-toggles');

    $this->visit('/checkbox-radio-toggles')
        ->dontSeeElement('div.form-check');
});
