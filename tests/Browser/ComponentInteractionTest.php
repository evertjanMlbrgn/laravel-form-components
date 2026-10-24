<?php

it('can interact with various form controls', function () {
    $this->visit('/form-components-preview')
        // Test text input
        ->type('native_text', 'Hello World')
        ->assertValue('native_text', 'Hello World')

        // Test checkbox
        ->check('defaultCheck1')
        ->assertChecked('defaultCheck1')
        ->uncheck('defaultCheck1')
        ->assertNotChecked('defaultCheck1')

        // Test radio
        ->check('exampleRadios2')
        ->assertChecked('exampleRadios2')
        ->assertNotChecked('exampleRadios1')

        // Test select
        ->select('reg_state', 'ny')
        ->assertValue('reg_state', 'ny')

        // Test textarea
        ->type('exampleFormControlTextarea1', 'Some long text')
        ->assertValue('exampleFormControlTextarea1', 'Some long text')

        // Test range
        ->type('customRange1', '75')
        ->assertValue('customRange1', '75');
});

it('can interact with switches and toggles', function () {
    $this->visit('/form-components-preview')
        // Switch
        ->click('label[for="flexSwitchCheckDefault"]')
        ->assertChecked('flexSwitchCheckDefault')

        // Toggle (checkbox)
        ->click('label[for="btn-check"]')
        ->assertChecked('btn-check')

        // Toggle (radio)
        ->click('label[for="option2"]')
        ->assertChecked('option2')
        ->assertNotChecked('option1');
});

it('can interact with input groups', function () {
    $this->visit('/form-components-preview')
        // Checkbox inside input group
        ->check('check1')
        ->assertChecked('check1')

        // Radio inside input group
        ->check('radio1')
        ->assertChecked('radio1');
});
