<?php

it('adds javascript when using attribute validation-mode="default" or "custom"', function() {
    $this->registerTestRoute('bootstrap-form-validation-custom');

    $this->visit('/bootstrap-form-validation-custom')
        ->seeElement('script[src$="form-validation.js"]');
});
