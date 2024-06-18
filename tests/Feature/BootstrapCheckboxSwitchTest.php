<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('sets correct classes on switch checkboxes', function () {
    $this->registerTestRoute('bootstrap-checkbox-switch');

    $this->visit('/bootstrap-checkbox-switch')
        ->seeElement('input[id="switch"].form-check-input')
        ->seeElement('label[for="switch"].form-check-label')
        ->seeElement('div.form-check.form-switch');
});
