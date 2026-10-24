<?php
// tests/Feature/PreviewFrameworkSwitcherTest.php

it('renders the preview page with the plain framework', function () {
    config(['form-components.framework' => 'plain']);
    $response = $this->get(route('form-components-preview'));
    $response->assertStatus(200);
    $response->assertSee('value="plain" selected', false);
    $response->assertSee('mfc-preview-body', false);
    $response->assertDontSee('cdn.tailwindcss.com');
    
    expect(config('form-components.framework'))->toBe('plain');
});

it('keeps the accessible framework switcher visible in every supported framework', function ($framework) {
    $response = $this->get(route('form-components-preview', ['framework' => $framework]));
    $document = new DOMDocument;
    @$document->loadHTML($response->getContent());
    $xpath = new DOMXPath($document);
    $switcher = $xpath->query('//select[@id="mfc-framework-switcher"]');
    $label = $xpath->query('//label[@for="mfc-framework-switcher"]');
    $hiddenAncestors = $xpath->query(
        '//select[@id="mfc-framework-switcher"]/ancestor::*['.
        'contains(concat(" ", normalize-space(@class), " "), " d-none ") or '.
        'contains(concat(" ", normalize-space(@class), " "), " hidden ")]'
    );

    $response->assertOk();
    expect($switcher->length)->toBe(1)
        ->and($label->length)->toBe(1)
        ->and($hiddenAncestors->length)->toBe(0);
})->with(['plain', 'bootstrap-5', 'bootstrap-6', 'tailwind', 'daisyui']);

it('switches to tailwind framework via query parameter', function () {
    $this->get(route('form-components-preview', ['framework' => 'tailwind']))
        ->assertStatus(200)
        ->assertSee('cdn.tailwindcss.com?plugins=forms')
        ->assertSee('value="tailwind" selected', false);
    
    expect(config('form-components.framework'))->toBe('tailwind');
});

it('switches to daisyui framework via query parameter', function () {
    $this->get(route('form-components-preview', ['framework' => 'daisyui']))
        ->assertStatus(200)
        ->assertSee('cdn.tailwindcss.com')
        ->assertDontSee('cdn.tailwindcss.com?plugins=forms')
        ->assertSee('daisyui@4.10.2/dist/full.min.css')
        ->assertSee('value="daisyui" selected', false);
    
    expect(config('form-components.framework'))->toBe('daisyui');
});

it('switches to bootstrap-5 framework via query parameter', function () {
    $this->get(route('form-components-preview', ['framework' => 'bootstrap-5']))
        ->assertStatus(200)
        ->assertSee('bootstrap@5.3.3/dist/css/bootstrap.min.css')
        ->assertDontSee('cdn.tailwindcss.com')
        ->assertSee('value="bootstrap-5" selected', false);
    
    expect(config('form-components.framework'))->toBe('bootstrap-5');
});

it('switches to bootstrap-6 framework and uses bootstrap 5 assets', function () {
    $this->get(route('form-components-preview', ['framework' => 'bootstrap-6']))
        ->assertStatus(200)
        ->assertSee('bootstrap@5.3.3/dist/css/bootstrap.min.css')
        ->assertDontSee('cdn.tailwindcss.com')
        ->assertSee('value="bootstrap-6" selected', false);
    
    expect(config('form-components.framework'))->toBe('bootstrap-6');
});

it('reverts to default if an unknown framework is provided', function () {
    config(['form-components.framework' => 'plain']);
    $this->get(route('form-components-preview', ['framework' => 'unknown']))
        ->assertStatus(200)
        ->assertSee('value="plain" selected', false)
        ->assertSee('mfc-preview-body', false)
        ->assertDontSee('cdn.tailwindcss.com')
        ->assertDontSee('daisyui@');
    
    expect(config('form-components.framework'))->toBe('plain');
});

it('handles array framework parameter without crashing', function () {
    config(['form-components.framework' => 'plain']);
    $this->get(route('form-components-preview') . '?framework[]=tailwind')
        ->assertStatus(200)
        ->assertSee('value="plain" selected', false)
        ->assertSee('mfc-preview-body', false)
        ->assertDontSee('cdn.tailwindcss.com')
        ->assertDontSee('daisyui@');
    
    expect(config('form-components.framework'))->toBe('plain');
});

it('uses plain by default when no framework is configured or requested', function () {
    config(['form-components.framework' => null]);

    $this->get(route('form-components-preview'))
        ->assertOk()
        ->assertSee('value="plain" selected', false)
        ->assertSee('mfc-preview-body', false)
        ->assertDontSee('cdn.tailwindcss.com')
        ->assertDontSee('daisyui@');
});

it('always loads bootstrap 5 assets for shell chrome', function ($framework) {
    $this->get(route('form-components-preview', ['framework' => $framework]))
        ->assertOk()
        ->assertSee('bootstrap@5.3.3/dist/css/bootstrap.min.css')
        ->assertSee('bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');
})->with(['plain', 'bootstrap-5', 'bootstrap-6', 'tailwind', 'daisyui']);

it('contains unique IDs that match sidebar navigation anchors', function () {
    $response = $this->get(route('form-components-preview'));
    $html = $response->getContent();
    
    $document = new DOMDocument();
    @$document->loadHTML($html);
    $xpath = new DOMXPath($document);
    
    $navLinks = $xpath->query('//*[@id="preview-sidebar"]//a[@href]');
    expect($navLinks->length)->toBeGreaterThan(0);
    
    foreach ($navLinks as $link) {
        $href = $link->getAttribute('href');
        if (str_starts_with($href, '#')) {
            $id = substr($href, 1);
            $targets = $xpath->query("//*[@id='$id']");
            expect($targets->length)->toBe(1, "Target ID '$id' should exist exactly once.");
        }
    }
});

it('configures scrollspy on the body', function () {
    $this->get(route('form-components-preview'))
        ->assertSee('data-bs-spy="scroll"', false)
        ->assertSee('data-bs-target="#preview-sidebar"', false);
});

it('shows compatibility alerts only for unsupported frameworks', function ($framework, $shouldSeeAlert) {
    $response = $this->get(route('form-components-preview', ['framework' => $framework]));
    
    if ($shouldSeeAlert) {
        $response->assertSee('mfc-shell-alert-warning', false);
        $response->assertSee('This feature is not natively supported', false);
        $response->assertSee('role="note"', false);
    } else {
        $response->assertDontSee('This feature is not natively supported');
        $response->assertDontSee('role="note"');
    }
})->with([
    ['plain', false],
    ['bootstrap-5', false],
    ['bootstrap-6', false],
    ['tailwind', true],
    ['daisyui', true],
]);

it('switches frameworks consecutively without errors', function () {
    // Start with tailwind
    $this->get(route('form-components-preview', ['framework' => 'tailwind']))
        ->assertOk();
        
    // Switch to daisyui in the same session (simulated)
    $this->get(route('form-components-preview', ['framework' => 'daisyui']))
        ->assertOk();
        
    // Switch back to bootstrap-5
    $this->get(route('form-components-preview', ['framework' => 'bootstrap-5']))
        ->assertOk();
});
