<?php

use Mlbrgn\LaravelFormComponents\Theme\Theme;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

beforeEach(function () {
    // Reset config before each test
    config(['form-components.framework' => 'bootstrap-5']);
});

it('renders checkbox with invalid class when there is a validation error in bootstrap-5', function () {
    config(['form-components.framework' => 'bootstrap-5']);

    $errors = new MessageBag(['test' => ['Error message']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = $this->blade('<x-form-checkbox name="test" />');
    $view->assertSee('class="form-check-input is-invalid"', false);
});

it('renders switch with invalid class when there is a validation error in bootstrap-5', function () {
    config(['form-components.framework' => 'bootstrap-5']);

    $errors = new MessageBag(['test' => ['Error message']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = $this->blade('<x-form-checkbox name="test" switch />');
    $view->assertSee('class="form-check-input is-invalid"', false);
});

it('renders checkbox with invalid class in plain theme', function () {
    config(['form-components.framework' => 'plain']);

    $errors = new MessageBag(['test' => ['Error message']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = $this->blade('<x-form-checkbox name="test" />');
    $view->assertSee('mfc-invalid');
});

it('renders input-group outer label with form-label and inner label with input-group-text in bootstrap-5', function () {
    config(['form-components.framework' => 'bootstrap-5']);

    $view = $this->blade('
        <x-form-input-group label="Outer Label">
            <x-form-label>Inner Label</x-form-label>
            <x-form-input name="test" />
        </x-form-input-group>
    ');

    $document = new DOMDocument;
    $document->loadHTML((string) $view);
    $xpath = new DOMXPath($document);
    $outerLabel = $xpath->query('//label[contains(normalize-space(.), "Outer Label")]')->item(0);
    $innerLabel = $xpath->query('//div[contains(concat(" ", normalize-space(@class), " "), " input-group ")]//label[contains(normalize-space(.), "Inner Label")]')->item(0);

    expect($outerLabel)->not->toBeNull();
    expect($innerLabel)->not->toBeNull();
    $outerClasses = preg_split('/\s+/', trim($outerLabel->getAttribute('class')));
    $innerClasses = preg_split('/\s+/', trim($innerLabel->getAttribute('class')));
    expect($outerClasses)->toContain('form-label');
    expect($outerClasses)->not->toContain('input-group-text');
    expect($innerClasses)->toContain('input-group-text');
});

it('honors modify_label_class false in input-group', function () {
    config(['form-components.framework' => 'bootstrap-5']);
    config(['form-components.modify_label_class' => false]);

    $view = $this->blade('
        <x-form-input-group label="Outer Label">
            <x-form-label>Inner Label</x-form-label>
            <x-form-input name="test" />
        </x-form-input-group>
    ');

    $view->assertSee('Outer Label');
    $view->assertSee('Inner Label');
    $view->assertSee('form-label');
    $view->assertDontSee('input-group-text');
});

it('deduplicates label classes accurately using tokens', function () {
    config(['form-components.framework' => 'bootstrap-5']);

    // Should NOT deduplicate if it's a substring but not exact match
    $view = $this->blade('<x-form-input name="test" label="Label" class-label="form-label-custom" />');
    $view->assertSee('form-label-custom');
    $view->assertSee('form-label');

    // Should deduplicate if it is an exact match
    $view = $this->blade('<x-form-input name="test" label="Label" class-label="form-label" />');
    $rendered = (string) $view;
    expect(substr_count($rendered, 'form-label'))->toBe(1);
});

it('deduplicates every theme label token for checkbox labels in tailwind and daisyui', function (string $framework) {
    config(['form-components.framework' => $framework]);

    $view = $this->blade('<x-form-checkbox name="test" label="Test checkbox" class-label="custom-label" />');
    $document = new DOMDocument;
    $document->loadHTML((string) $view);
    $xpath = new DOMXPath($document);
    $label = $xpath->query('//label')->item(0);

    expect($label)->not->toBeNull();
    $classes = preg_split('/\s+/', trim($label->getAttribute('class')));

    expect($classes)->toContain('custom-label');
    expect(count($classes))->toBe(count(array_unique($classes)));
})->with(['tailwind', 'daisyui']);

it('renders x-form-group with group class and fields with field class in bootstrap-5', function () {
    config(['form-components.framework' => 'bootstrap-5']);

    $view = $this->blade('<x-form-group label="My Group">Content</x-form-group>');
    $view->assertSee('class="form-group"', false);
    $view->assertDontSee('mb-3'); // x-form-group in BS5 should only have form-group now

    // Bootstrap 5 keeps its backwards compatible default: no automatic field wrapper
    $view = $this->blade('<x-form-input name="test" label="My Input" />');
    $view->assertDontSee('mb-3');
    $view->assertDontSee('form-group');

    // When the group wrapper is enabled, the field wrapper uses the separate `field` key
    config(['form-components.themes.bootstrap-5.use_group_wrapper' => true]);
    $view = $this->blade('<x-form-input name="test" label="My Input" />');
    $view->assertSee('class="mb-3"', false);
    $view->assertDontSee('form-group'); // field wrapper in BS5 should only have mb-3
});

it('renders field wrapper in tailwind with mb-4', function () {
    config(['form-components.framework' => 'tailwind']);

    $view = $this->blade('<x-form-input name="test" label="My Input" />');
    $view->assertSee('class="mb-4"', false);
});

it('passes generated id, public props and attributes to a theme view override', function () {
    $path = sys_get_temp_dir().'/mfc_override_'.uniqid();
    mkdir($path.'/themes/test-theme', 0777, true);
    file_put_contents(
        $path.'/themes/test-theme/input.blade.php',
        'id={{ $id }}|name={{ $name }}|type={{ $type }}|data={{ $attributes->get("data-x") }}'
    );

    try {
        View::prependNamespace('mlbrgn-form-components', $path);
        config(['form-components.framework' => 'test-theme']);

        $view = $this->blade('<x-form-input name="email" type="email" id="custom-id" data-x="foo" />');
        $view->assertSee('id=custom-id|name=email|type=email|data=foo', false);

        // generated id when none is supplied
        $view = $this->blade('<x-form-input name="email" type="email" />');
        $view->assertSee('id=auto_id_', false);
        $view->assertSee('name=email|type=email', false);
    } finally {
        \Illuminate\Support\Facades\File::deleteDirectory($path);
    }
});

it('keeps the explicit id attribute on the rendered bootstrap-5 input', function () {
    config(['form-components.framework' => 'bootstrap-5']);

    $view = $this->blade('<x-form-input name="email" id="my-id" label="Email" />');
    $view->assertSee('id="my-id"', false);
    $view->assertSee('for="my-id"', false);
});
