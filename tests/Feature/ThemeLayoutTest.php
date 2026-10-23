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

it('does not inherit the plain input wrapper class in bootstrap 5', function () {
    config(['form-components.framework' => 'bootstrap-5']);
    config(['form-components.themes.bootstrap-5.use_input_wrapper' => true]);

    $view = $this->blade('<x-form-input name="test" />');

    $view->assertDontSee('mfc-control');
});

it('verifies that each framework respects its own structural flags', function ($framework, $expectedClass) {
    config(['form-components.framework' => $framework]);

    // Test with flag ON
    config(["form-components.themes.{$framework}.use_group_wrapper" => true]);
    $view = $this->blade('<x-form-input name="test" />');

    $document = new DOMDocument;
    @$document->loadHTML((string) $view);
    $xpath = new DOMXPath($document);
    $nodes = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' {$expectedClass} ')]");
    expect($nodes->length)->toBeGreaterThan(0, "Framework {$framework} should show {$expectedClass} when use_group_wrapper is true");

    // Test with flag OFF
    config(["form-components.themes.{$framework}.use_group_wrapper" => false]);
    $view = $this->blade('<x-form-input name="test" />');

    $document = new DOMDocument;
    @$document->loadHTML((string) $view);
    $xpath = new DOMXPath($document);
    $nodes = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' {$expectedClass} ')]");
    expect($nodes->length)->toBe(0, "Framework {$framework} should NOT show {$expectedClass} when use_group_wrapper is false");
})->with([
    ['plain', 'mfc-field'],
    ['bootstrap-5', 'mb-3'],
    ['bootstrap-6', 'mb-3'],
    ['tailwind', 'mb-4'],
    ['daisyui', 'form-control'],
]);

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
