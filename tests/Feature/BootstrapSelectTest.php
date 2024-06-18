<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('shows the slot if the options are empty', function () {
    $this->registerTestRoute('select-slot');

    $this->visit('/select-slot')
        ->seeElement('option[value="a"]')
        ->seeElement('option[value="b"]')
        ->seeElement('option[value="c"]');
});

it('can render a placeholder', function () {
    $this->registerTestRoute('select-placeholder');

    $this->visit('/select-placeholder')
        ->seeElement('option[value=""][selected="selected"]')
        ->seeElement('option[value="a"]')
        ->seeElement('option[value="b"]');
});

it('always has an id attribute', function () {
    $this->registerTestRoute('select-slot');

    $this->visit('/select-slot')
        ->seeElement('select[name="select"][id]');
});

it('does not render label when select is hidden', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->dontSeeElement('label[for="hidden-select"]')
            ->seeElement('label[for="non-hidden-select"]');
});
