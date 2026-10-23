<?php

use Mlbrgn\LaravelFormComponents\Theme\Theme;

it('can resolve a theme key', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => [
        'test_key' => 'test_value',
    ]]);

    expect(Theme::resolve('test_key'))->toBe('test_value');
});

it('returns default value if key is not found', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => []]);

    expect(Theme::resolve('non_existent_key', 'default'))->toBe('default');
});

it('defaults to plain if framework is not set or not in config', function () {
    // Ensure we are testing the default behavior
    config(['form-components.framework' => null]);

    $expected = config('form-components.themes.plain.form_label');

    expect(Theme::resolve('form_label'))->toBe($expected);
    expect(Theme::framework())->toBe('plain');
});

it('can get the active framework', function () {
    config(['form-components.framework' => 'tailwind']);
    expect(Theme::framework())->toBe('tailwind');
});

it('can resolve nested keys using dot notation', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => [
        'nested' => [
            'key' => 'value',
        ],
    ]]);

    expect(Theme::resolve('nested.key'))->toBe('value');
});

it('falls back to plain if key is missing in active theme', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => []]);
    config(['form-components.themes.plain' => ['test_key' => 'plain_value']]);

    expect(Theme::resolve('test_key'))->toBe('plain_value');
});

it('falls back to plain if framework is unknown', function () {
    config(['form-components.framework' => 'unknown']);
    config(['form-components.themes.plain' => ['test_key' => 'plain_value']]);

    expect(Theme::resolve('test_key'))->toBe('plain_value');
});

it('preserves false values and does not fall back', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => ['test_flag' => false]]);
    config(['form-components.themes.plain' => ['test_flag' => true]]);

    expect(Theme::resolve('test_flag'))->toBe(false);
});

it('can check if a key exists', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.test-framework' => ['key1' => 'val1']]);
    config(['form-components.themes.plain' => ['key2' => 'val2']]);

    expect(Theme::has('key1'))->toBeTrue();
    expect(Theme::has('key2'))->toBeTrue();
    expect(Theme::has('non_existent'))->toBeFalse();
});

it('can get all theme values with fallbacks', function () {
    config(['form-components.framework' => 'test-framework']);
    config(['form-components.themes.plain' => [
        'key1' => 'plain1',
        'key2' => 'plain2',
    ]]);
    config(['form-components.themes.test-framework' => [
        'key1' => 'active1',
    ]]);

    $all = Theme::all();
    expect($all['key1'])->toBe('active1');
    expect($all['key2'])->toBe('plain2');
});
