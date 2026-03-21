<?php

it('enables validation assets when using custom validation mode', function () {
    $this->registerTestRoute('bootstrap-form-validation-custom');

    $response = $this->visit('/bootstrap-form-validation-custom');
        $response->seeElement('.mlbrgn-form-components-config')
//        ->seeInElement(
//            '.mlbrgn-form-components-config',
//            '"validation":true'
//        )
        ->seeElement('[data-mlbrgn-validation]');

        expect($response)->toMatchSnapshot();
});

it('defaults to validation mode "client-custom"', function () {
    Config::set('form-components.default-form-validation-mode', 'client-custom');
    $this->registerTestRoute('bootstrap-form-validation');

    $this->visit('/bootstrap-form-validation')
        ->within('#form-validation-mode-fallback', function () {
            $this->seeElement('form.needs-validation[novalidate]');
        });
});
