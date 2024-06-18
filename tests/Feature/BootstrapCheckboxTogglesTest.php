<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('sets correct classes on toggle checkboxes', function () {
    $this->registerTestRoute('bootstrap-checkbox-toggles');

    $this->visit('/bootstrap-checkbox-toggles')
        ->seeElement('input[value="checkbox-value"].btn-check')
        ->seeElement('input[value="checkbox-value"] ~ label.btn');
});

it('does not set class "form-check-label" on toggle checkboxes', function () {
    $this->registerTestRoute('bootstrap-checkbox-toggles');

    $this->visit('/bootstrap-checkbox-toggles')
        ->seeElement('input[value="checkbox-value"] ~ label:not(.form-check-label)');
});

it('does not use wrapper on toggle checkboxes', function () {
    $this->registerTestRoute('bootstrap-checkbox-toggles');

    $this->visit('/bootstrap-checkbox-toggles')
        ->dontSeeElement('div.form-check');
});
