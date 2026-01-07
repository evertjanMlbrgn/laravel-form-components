<?php

it('renders form group', function () {
    $this->registerTestRoute('group')
        ->visit('group')
        ->seeElement('div.form-group input[name="input"]');
});

it('renders form group inline', function () {
    $this->registerTestRoute('group-inline')
        ->visit('group-inline')
        ->seeElement('div.form-group div.inline-space input[name="input"]');
});

it('adds class-inline-wrapper classes', function () {
    $this->registerTestRoute('group-class-inline-wrapper-attribute')
        ->visit('group-class-inline-wrapper-attribute')
        ->seeElement('div.form-group div.inline-space.gap-3 input[name="input"]')
        ->dontSeeElement('div.form-group div.inline-space.gap-3[class-inline-wrapper] input[name="input"]');
});
