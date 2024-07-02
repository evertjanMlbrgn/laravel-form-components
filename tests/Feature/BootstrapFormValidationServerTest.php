<?php

it('adds javascript when using attribute validation-mode="client-default" or "client-custom"', function() {
    $this->registerTestRoute('bootstrap-form-validation-server');

    $this->visit('/bootstrap-form-validation-server')
        ->seeElement('form')
        ->dontSeeElement('script[src$="form-validation.js"]');
});

it('defaults to validation mode "server"', function() {
    Config::set('form-components.default-form-validation-mode', 'server');
    $this->registerTestRoute('bootstrap-form-validation');

    $this->visit('/bootstrap-form-validation')
        ->within('#form-validation-mode-fallback', function() {
            $this->seeElement('form:not(.needs-validation)[novalidate]');
        });
});
