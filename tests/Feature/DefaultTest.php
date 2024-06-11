<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
it('can set a default value', function () {
    $this->registerTestRoute('default-values');

    $this->visit('/default-values')
        ->seeElement('input[name="input"][value="a"]')
        ->seeInElement('textarea[name="textarea"]', 'b')
        ->seeElement('option[value="c"]:selected')
        ->seeElement('input[name="checkbox"]:checked')
        ->seeElement('input[name="radio"]:checked');
});
