<?php

it('shows values with correct precedence in the browser', function () {
    $this->visit('/form-components-preview')
        // Default only
        ->assertValue('input_default', 'I am the default')

        // Bound value overrides default
        ->assertValue('input_bound', 'Value from @bind directive')

        // Explicit value overrides bound/default
        ->assertValue('input_value', 'I am explicit')

        // Old input overrides everything
        ->assertValue('input_old', 'Value from old input')

        // Full precedence test: Old > Explicit > Bound > Default
        // In the view, input_precedence has:
        // - old: 'Old value (highest precedence)'
        // - explicit: 'Explicit Value'
        // - bound: 'Bound value (should be overridden)'
        // - default: 'Default Value'
        ->assertValue('input_precedence', 'Old value (highest precedence)');
});

it('supports binding via attribute', function () {
    $this->visit('/form-components-preview')
        ->assertValue('input_attr_bind', 'Value from attribute bind');
});
