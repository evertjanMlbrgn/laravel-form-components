<?php

it('enables validation assets when using client validation mode', function () {
    $this->registerTestRoute('bootstrap-form-validation-default');

    $this->visit('/bootstrap-form-validation-default')
        ->seeElement('#mlbrgn-asset-config')
        ->seeInElement(
            '#mlbrgn-asset-config',
            '"validation":true'
        )
        ->seeElement('[data-mlbrgn-validation]');
});

it('defaults to validation mode "client-default"', function () {
    Config::set('form-components.default-form-validation-mode', 'client-default');
    $this->registerTestRoute('bootstrap-form-validation');

    $this->visit('/bootstrap-form-validation')
        ->within('#form-validation-mode-fallback', function () {
            $this->seeElement('form.needs-validation:not([novalidate])');
        });
});
