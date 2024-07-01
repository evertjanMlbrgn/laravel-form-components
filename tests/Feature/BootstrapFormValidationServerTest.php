<?php

it('adds javascript when using attribute validation-mode="default" or "custom"', function() {
    $this->registerTestRoute('bootstrap-form-validation-server');

    $this->visit('/bootstrap-form-validation-server')
        ->seeElement('form')
        ->dontSeeElement('script[src$="form-validation.js"]');
});
