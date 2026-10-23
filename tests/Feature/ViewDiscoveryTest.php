<?php
// tests/Feature/ViewDiscoveryTest.php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    $this->tempViewPath = __DIR__ . '/temp_views';
    if (!is_dir($this->tempViewPath)) {
        mkdir($this->tempViewPath, 0777, true);
    }
});

afterEach(function () {
    if (is_dir($this->tempViewPath)) {
        File::deleteDirectory($this->tempViewPath);
    }
});

it('registers the package view root for theme discovery', function () {
    $hints = app('view')->getFinder()->getHints();
    $packageViews = realpath(dirname(__DIR__, 2).'/resources/views');

    expect($hints['mlbrgn-form-components'])->toContain($packageViews);
});

it('falls back to default view if theme view does not exist', function () {
    config(['form-components.framework' => 'non-existent']);
    
    // Create a default view in our temp path
    File::put($this->tempViewPath . '/input.blade.php', '<div class="default-input">Default Input</div>');
    
    // Prepend our temp path to the namespace to ensure it's checked first
    View::prependNamespace('mlbrgn-form-components', $this->tempViewPath);
    
    $view = $this->blade('<x-form-input name="test" />');
    
    $view->assertSee('default-input');
});

it('uses theme-specific view if it exists', function () {
    $themePath = $this->tempViewPath . '/themes/test-theme';
    File::makeDirectory($themePath, 0777, true, true);
    File::put($themePath . '/input.blade.php', '<div class="theme-input">Theme Input</div>');
    
    // Also create a default view to ensure theme one is preferred
    File::put($this->tempViewPath . '/input.blade.php', '<div class="default-input">Default Input</div>');
    
    View::prependNamespace('mlbrgn-form-components', $this->tempViewPath);
    
    config(['form-components.framework' => 'test-theme']);
    
    $view = $this->blade('<x-form-input name="test" />');
    
    $view->assertSee('theme-input');
    $view->assertDontSee('default-input');
});

it('prefers published theme override over package theme view', function () {
    // Package path (simulated by a directory)
    $packagePath = $this->tempViewPath . '/package';
    File::makeDirectory($packagePath . '/themes/test-theme', 0777, true, true);
    File::put($packagePath . '/themes/test-theme/input.blade.php', '<div class="package-theme-input">Package Theme</div>');
    
    // Published path (simulated by another directory)
    $publishedPath = $this->tempViewPath . '/published';
    File::makeDirectory($publishedPath . '/themes/test-theme', 0777, true, true);
    File::put($publishedPath . '/themes/test-theme/input.blade.php', '<div class="published-theme-input">Published Theme</div>');
    
    // Prepend package path, then prepend published path (so published is first)
    View::prependNamespace('mlbrgn-form-components', $packagePath);
    View::prependNamespace('mlbrgn-form-components', $publishedPath);
    
    config(['form-components.framework' => 'test-theme']);
    
    $view = $this->blade('<x-form-input name="test" />');
    
    $view->assertSee('published-theme-input');
    $view->assertDontSee('package-theme-input');
});

it('respects theme discovery for layout components', function () {
    $themePath = $this->tempViewPath . '/themes/test-theme/layout';
    File::makeDirectory($themePath, 0777, true, true);
    File::put($themePath . '/form-group.blade.php', '<div class="theme-group">{{ $slot }}</div>');
    
    View::prependNamespace('mlbrgn-form-components', $this->tempViewPath);
    
    config(['form-components.framework' => 'test-theme']);
    
    $view = $this->blade('<x-form-layout.form-group>Content</x-form-layout.form-group>');
    
    $view->assertSee('theme-group');
    $view->assertSee('Content');
});

it('uses the real DaisyUI checkbox override when framework is daisyui', function () {
    config(['form-components.framework' => 'daisyui']);
    
    $view = $this->blade('<x-form-checkbox name="test" label="Daisy Checkbox" />');
    
    // The DaisyUI checkbox override uses specific classes and structure
    // e.g., <label class="label cursor-pointer ...">
    $view->assertSee('label cursor-pointer');
    $view->assertSee('checkbox');
});
