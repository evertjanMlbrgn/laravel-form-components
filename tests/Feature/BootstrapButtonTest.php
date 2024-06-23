<?php

it('lets buttons default to correct type', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('/bootstrap-button')
        ->within('#form-1', function() {
            $this->seeElement('button[id="button"][type="button"].btn')
            ->seeElement('button[id="button-submit"][type="submit"].btn')
            ->seeElement('button[id="button-reset"][type="reset"].btn')
            ->seeElement('button[id="button-2"][type="button"].btn')
            ->seeElement('button[id="button-submit-2"][type="submit"].btn');
        });
});

it('sets classes on button', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('/bootstrap-button')
        ->within('#form-2', function() {
            $this->seeElement('button[id="button-2"].btn.btn-my-button:not(.btn-primary)')
                ->seeElement('button[id="button-submit-2"][type="submit"].btn.btn-something:not(.btn-primary)')
                ->seeElement('button[id="button-reset-2"][type="reset"].btn.btn-something-else:not(.btn-primary)');
        });
});

it('sets extra classes on button', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('/bootstrap-button')
        ->within('#form-3', function() {
            $this->seeElement('button[id="button-3"].btn.btn-sm')
                ->seeElement('button[id="button-submit-3"][type="submit"].btn.btn-lg')
                ->seeElement('button[id="button-reset-3"][type="reset"].btn.btn-extra');
        });
});

it('sets extra attributes on button', function () {
    $this->registerTestRoute('bootstrap-button');

    $this->visit('/bootstrap-button')
        ->within('#form-4', function() {
            $this->seeElement('button[id="button-4"][autofocus][disabled]')
            ->seeElement('button[id="button-submit-4"][formtarget="test"][value="submit value"]')
            ->seeElement('button[id="button-reset-4"][formnovalidate][formaction="test"]');
        });
});

it('can set label as slot', function () {
    $this->registerTestRoute('bootstrap-button');

    $this->visit('/bootstrap-button')
        ->within('#form-5', function() {
            $this->seeInElement('button[id="button-5"]', 'Button 5 label')
            ->seeInElement('button[id="button-submit-5"]', 'Button submit 5 label')
            ->seeInElement('button[id="button-reset-5"]', 'Button reset 5 label');
        });
});

it('does not let type of submit button be overridden', function () {
    $this->registerTestRoute('bootstrap-button');

    $this->visit('/bootstrap-button')
        ->within('#form-6', function() {
            $this->seeElement('button[id="button-submit-6"][type="submit"]');
        });
});

