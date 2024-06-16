<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('lets buttons default to correct type', function () {
    $this->registerTestRoute('custom-button');
    $this->visit('custom-button')
        ->within('#form-1', function() {
            $this->seeElement('button[id="button"][type="button"].btn')
            ->seeElement('button[id="button-submit"][type="submit"].btn')
            ->seeElement('button[id="button-reset"][type="reset"].btn');
        });
});

it('sets classes on button', function () {
    $this->registerTestRoute('custom-button');
    $this->visit('custom-button')
        ->within('#form-2', function() {
            $this->seeElement('button[id="button-2"].btn.btn-my-button:not(.btn-primary)')
                ->seeElement('button[id="button-submit-2"][type="submit"].btn.btn-something:not(.btn-primary)')
                ->seeElement('button[id="button-reset-2"][type="reset"].btn.btn-something-else:not(.btn-primary)');
        });
});

it('sets extra classes on button', function () {
    $this->registerTestRoute('custom-button');
    $this->visit('custom-button')
        ->within('#form-3', function() {
            $this->seeElement('button[id="button-3"].btn.btn-sm')
                ->seeElement('button[id="button-submit-3"][type="submit"].btn.btn-lg')
                ->seeElement('button[id="button-reset-3"][type="reset"].btn.btn-extra');
        });
});

