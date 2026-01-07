<?php

it('enables validation assets when using custom validation mode', function () {
    $this->registerTestRoute('bootstrap-form-validation-custom');

    $this->visit('/bootstrap-form-validation-custom')
        ->seeElement('#mlbrgn-asset-config')
        ->seeInElement(
            '#mlbrgn-asset-config',
            '"validation":true'
        )
        ->seeElement('[data-mlbrgn-validation]');
});

it('defaults to validation mode "client-custom"', function () {
    Config::set('form-components.default-form-validation-mode', 'client-custom');
    $this->registerTestRoute('bootstrap-form-validation');

    $this->visit('/bootstrap-form-validation')
        ->within('#form-validation-mode-fallback', function () {
            $this->seeElement('form.needs-validation[novalidate]');
        });
});
