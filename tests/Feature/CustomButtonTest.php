<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('lets buttons default to correct type', function () {
    $this->registerTestRoute('custom-button');
    $this->visit('custom-button')
        ->seeElement('button[id="button"][type="button"].btn')
        ->seeElement('button[id="button-submit"][type="submit"].btn')
        ->seeElement('button[id="button-reset"][type="reset"].btn');
});
