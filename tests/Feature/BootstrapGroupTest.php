<?php

it('renders form group', function () {
    $this->registerTestRoute('bootstrap-group')
        ->visit('bootstrap-group')
        ->within('#form-group', function() {
            $this->seeElement('div.form-group div:not(.inline-space) input[name="input"]');
        });
});

it('renders form group inline', function () {
    $this->registerTestRoute('bootstrap-group')
        ->visit('bootstrap-group')
        ->within('#form-group-inline', function() {
            $this->seeElement('div.form-group div.inline-space input[name="input"]');
        });
});
