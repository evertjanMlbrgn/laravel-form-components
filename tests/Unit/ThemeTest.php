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

it('defaults to bootstrap-5 if framework is not set or not in config', function () {
    // Ensure we are testing the default behavior
    config(['form-components.framework' => null]);
    
    $themes = config('form-components.themes');
    // dump($themes);
    
    $expected = config('form-components.themes.bootstrap-5.form_label');
    
    expect(Theme::resolve('form_label'))->toBe($expected);
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
