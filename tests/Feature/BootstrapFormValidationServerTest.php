<?php

it('does not enable validation assets when using server validation mode', function () {
    $this->registerTestRoute('bootstrap-form-validation-server');

    $response = $this->visit('/bootstrap-form-validation-server');
//    dd($response);

    $response
        ->within('#bootstrap-form-validation-server', function () {
            $this->seeElement('form:not(.needs-validation)[novalidate]')
                ->seeElement('.mlbrgn-form-components-config')
                ->dontSeeElement('[data-mlbrgn-validation]');
        });

    expect($response)->toMatchSnapshot();
});

it('defaults to validation mode "server"', function () {
    Config::set('form-components.default-form-validation-mode', 'server');
    $this->registerTestRoute('bootstrap-form-validation');

    $this->visit('/bootstrap-form-validation')
        ->within('#form-validation-mode-fallback', function () {
            $this->seeElement('form:not(.needs-validation)[novalidate]');
        });
});
