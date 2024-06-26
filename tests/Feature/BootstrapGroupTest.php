<?php

it('renders form group', function () {
    $this->registerTestRoute('bootstrap-group')
        ->visit('bootstrap-group')
        ->within('#form-group', function() {
            $this->seeElement('div.form-group input[name="input"]');
        });
});

it('renders form group inline', function () {
    $this->registerTestRoute('bootstrap-group')
        ->visit('bootstrap-group')
        ->within('#form-group-inline', function() {
            $this->seeElement('div.form-group div.inline-space input[name="input"]');
        });
});

it('adds class-inline-wrapper classes', function () {
    $this->registerTestRoute('bootstrap-group')
        ->visit('bootstrap-group')
        ->within('#form-group-inline-with-class-inline-wrapper-attribute', function() {
            $this->seeElement('div.form-group div.inline-space.gap-3 input[name="input"]')
            ->dontSeeElement('div.form-group div.inline-space.gap-3[class-inline-wrapper] input[name="input"]');
        });
});
