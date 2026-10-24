<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Mlbrgn\LaravelFormComponents\Theme\Theme;

it('uses plain theme by default', function () {
    config(['form-components.framework' => null]);
    expect(Theme::framework())->toBe('plain');
});

it('defines plain as the package default when no environment override is set', function () {
    $frameworkVariable = 'FORM_COMPONENTS_FRAMEWORK';
    $environmentValue = getenv($frameworkVariable);
    $environmentValueExists = $environmentValue !== false;
    $envValueExists = array_key_exists($frameworkVariable, $_ENV);
    $envValue = $_ENV[$frameworkVariable] ?? null;
    $serverValueExists = array_key_exists($frameworkVariable, $_SERVER);
    $serverValue = $_SERVER[$frameworkVariable] ?? null;

    putenv($frameworkVariable);
    unset($_ENV[$frameworkVariable], $_SERVER[$frameworkVariable]);

    try {
        $packageConfig = require dirname(__DIR__, 2).'/config/config.php';
    } finally {
        if ($environmentValueExists) {
            putenv($frameworkVariable.'='.$environmentValue);
        }

        if ($envValueExists) {
            $_ENV[$frameworkVariable] = $envValue;
        }

        if ($serverValueExists) {
            $_SERVER[$frameworkVariable] = $serverValue;
        }
    }

    expect($packageConfig['framework'])->toBe('plain');
});

it('renders plain theme semantic classes and no bootstrap classes', function () {
    config(['form-components.framework' => 'plain']);

    $view = $this->blade('<x-form-input name="test" label="My Label" />');
    $document = new DOMDocument;
    $document->loadHTML((string) $view);
    $xpath = new DOMXPath($document);
    $input = $xpath->query('//input[@name="test"]')->item(0);
    $label = $xpath->query('//label')->item(0);
    $field = $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " mfc-field ")]')->item(0);

    expect(preg_split('/\s+/', $field->getAttribute('class')))->toContain('mfc-field');
    expect(preg_split('/\s+/', $label->getAttribute('class')))->toContain('mfc-label');
    expect(preg_split('/\s+/', $input->getAttribute('class')))->toContain('mfc-input');

    $classNames = [];
    foreach ($xpath->query('//*[@class]') as $element) {
        $classNames = array_merge($classNames, preg_split('/\s+/', trim($element->getAttribute('class'))));
    }

    expect($classNames)->not->toContain('form-control', 'form-label', 'mb-3');
});

it('keeps semantic control modifiers on the input and spacing classes on the field in plain mode', function () {
    config(['form-components.framework' => 'plain']);

    $view = $this->blade('<x-form-input name="test" class="mfc-input-lg mb-4" />');
    $document = new DOMDocument;
    $document->loadHTML((string) $view);
    $xpath = new DOMXPath($document);
    $input = $xpath->query('//input[@name="test"]')->item(0);
    $field = $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " mfc-field ")]')->item(0);
    $inputClasses = preg_split('/\s+/', $input->getAttribute('class'));
    $fieldClasses = preg_split('/\s+/', $field->getAttribute('class'));

    expect($inputClasses)->toContain('mfc-input-lg');
    expect($inputClasses)->not->toContain('mb-4');
    expect($fieldClasses)->toContain('mb-4');
    expect($fieldClasses)->not->toContain('mfc-input-lg');
    $view->assertDontSee('mfc-control');
});

it('renders error message with mfc-error class when there is a validation error', function () {
    config(['form-components.framework' => 'plain']);

    // Simulate validation error
    $errors = new MessageBag(['test' => ['The test field is required.']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = $this->blade('<x-form-input name="test" />');

    $view->assertSee('mfc-error');
    $view->assertSee('The test field is required.');
    $view->assertSee('mfc-invalid');
});
