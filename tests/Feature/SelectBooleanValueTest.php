<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
it('shows the select field', function () {
    $this->registerTestRoute('select-boolean-value');

    $this->visit('/select-boolean-value')
        ->seeElement('option[value="1"]')
        ->seeElement('option[value="0"]');
});

it('shows the false value selected', function () {
    $this->registerTestRoute('select-boolean-value');

    $this->visit('/select-boolean-value')
        ->seeElement('option[value="1"]')
        ->seeElement('option[value="0"][selected="selected"]');
});
