<?php

it('renders a group wrapper when use_group_wrapper is true', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => [
        'use_group_wrapper' => true,
        'group' => 'custom-group-class',
    ]]);

    // We use a real component to test the layout integration
    $view = $this->blade('<x-form-input name="test" />');

    $view->assertSee('custom-group-class');
});

it('does not render a group wrapper when use_group_wrapper is false', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => [
        'use_group_wrapper' => false,
    ]]);

    $view = $this->blade('<x-form-input name="test" />');

    // By default bootstrap-5 has use_group_wrapper = false in our config
    // It should not render the 'group' class (which is 'mb-3' for bootstrap)
    $view->assertDontSee('mb-3');
});

it('renders an input wrapper when use_input_wrapper is true', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => [
        'use_input_wrapper' => true,
        'input_wrapper' => 'custom-input-wrapper',
    ]]);

    $view = $this->blade('<x-form-input name="test" />');

    $view->assertSee('custom-input-wrapper');
});

it('renders horizontal layout classes correctly', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => [
        'wrapper_horizontal' => 'test-row',
        'wrapper_horizontal_label' => 'test-label-col',
        'wrapper_horizontal_control' => 'test-control-col',
    ]]);

    $view = $this->blade('<x-form-input name="test" label="Test Label" horizontal />');
    // echo $view;

    $view->assertSee('test-row');
    $view->assertSee('test-label-col');
    $view->assertSee('test-control-col');
    $view->assertSee('Test Label');
});
