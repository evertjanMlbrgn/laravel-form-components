<?php

it('sets correct classes on toggle checkboxes and radios', function () {
    $this->registerTestRoute('bootstrap-radio-toggles');

    $this->visit('/bootstrap-radio-toggles')
        ->seeElement('input[value="radio-value"].btn-check')
        ->seeElement('input[value="radio-value"] ~ label.btn');
});

it('does not set class "form-check-label" on toggle checkboxes and radios', function () {
    $this->registerTestRoute('bootstrap-radio-toggles');

    $this->visit('/bootstrap-radio-toggles')
        ->seeElement('input[value="radio-value"] ~ label:not(.form-check-label)');
});

it('does not use wrapper on toggle checkboxes and radios', function () {
    $this->registerTestRoute('bootstrap-radio-toggles');

    $this->visit('/bootstrap-radio-toggles')
        ->dontSeeElement('div.form-check');
});
