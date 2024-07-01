<?php

it('adds javascript when using attribute validation-mode="default" or "custom"', function() {
    $this->registerTestRoute('bootstrap-form-validation-default');

    $this->visit('/bootstrap-form-validation-default')
        ->seeElement('script[src$="form-validation.js"]');
});
