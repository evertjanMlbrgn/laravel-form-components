<?php

it('adds javascript when using attribute validation-mode="client-default" or "client-custom"', function () {
    $this->registerTestRoute('bootstrap-form-validation-custom');

    $this->visit('/bootstrap-form-validation-custom')
        ->seeElement('script[src$="form-validation.js"]');
});

it('defaults to validation mode "client-custom"', function () {
    Config::set('form-components.default-form-validation-mode', 'client-custom');
    $this->registerTestRoute('bootstrap-form-validation');

    $this->visit('/bootstrap-form-validation')
        ->within('#form-validation-mode-fallback', function () {
            $this->seeElement('form.needs-validation[novalidate]');
        });
});
