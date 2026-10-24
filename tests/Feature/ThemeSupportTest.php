<?php

use Mlbrgn\LaravelFormComponents\Theme\Theme;

test('it returns true for missing keys by default', function () {
    config(['form-components.framework' => 'plain']);

    expect(Theme::supports('non_existent_feature'))->toBeTrue();
});

test('it identifies unsupported features in daisyui', function () {
    config(['form-components.framework' => 'daisyui']);

    expect(Theme::supports('floating_labels'))->toBeFalse();
});

test('it identifies unsupported features in tailwind', function () {
    config(['form-components.framework' => 'tailwind']);

    expect(Theme::supports('floating_labels'))->toBeFalse();
});

test('it identifies supported features in bootstrap-5', function () {
    config(['form-components.framework' => 'bootstrap-5']);

    expect(Theme::supports('floating_labels'))->toBeTrue();
});

test('bootstrap-6 inherits supports from bootstrap-5', function () {
    config(['form-components.framework' => 'bootstrap-6']);

    // Check that it inherits the floating_labels = true from $bootstrap5
    expect(Theme::supports('floating_labels'))->toBeTrue();

    // Assert that the raw config matches
    expect(config('form-components.themes.bootstrap-6.supports'))
        ->toBe(config('form-components.themes.bootstrap-5.supports'));
});

test('it returns display names for frameworks', function () {
    expect(Theme::frameworkName('bootstrap-5'))->toBe('Bootstrap 5')
        ->and(Theme::frameworkName('daisyui'))->toBe('DaisyUI')
        ->and(Theme::frameworkName('tailwind'))->toBe('Tailwind CSS')
        ->and(Theme::frameworkName('plain'))->toBe('Plain')
        ->and(Theme::frameworkName('unknown'))->toBe('Unknown');
});

test('it returns true for unknown frameworks', function () {
    config(['form-components.framework' => 'unknown-framework']);

    expect(Theme::supports('any_feature'))->toBeTrue();
});
