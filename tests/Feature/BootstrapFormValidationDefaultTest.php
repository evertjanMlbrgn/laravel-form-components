<?php

it('adds javascript when using attribute validation-mode="client-default" or "client-custom"', function () {
    $this->registerTestRoute('bootstrap-form-validation-default');

    $this->visit('/bootstrap-form-validation-default')
        ->seeElement('script[src$="form-validation.js"]');
});

it('defaults to validation mode "client-default"', function () {
    Config::set('form-components.default-form-validation-mode', 'client-default');
    $this->registerTestRoute('bootstrap-form-validation');

    $this->visit('/bootstrap-form-validation')
        ->within('#form-validation-mode-fallback', function () {
            $this->seeElement('form.needs-validation:not([novalidate])');
        });
});
