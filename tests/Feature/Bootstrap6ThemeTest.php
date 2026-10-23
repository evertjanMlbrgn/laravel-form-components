<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

function bootstrap6ClassTokens(string $html): array
{
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    $tokens = [];
    foreach ($xpath->query('//*[@class]') as $element) {
        $tokens = array_merge($tokens, preg_split('/\s+/', trim($element->getAttribute('class'))));
    }

    return $tokens;
}

dataset('bootstrap6Baseline', [
    'input' => ['<x-form-input name="test" label="My Label" />', 'form-control'],
    'select' => ['<x-form-select name="test" label="My Label" :options="[\'a\' => \'A\']" />', 'form-select'],
    'checkbox' => ['<x-form-checkbox name="test" label="My Label" />', 'form-check-input'],
    'submit' => ['<x-form-submit label="Save" />', 'btn'],
]);

dataset('bootstrap6WithErrors', [
    'input' => ['<x-form-input name="test" label="My Label" />', 'form-control', true],
    'select' => ['<x-form-select name="test" label="My Label" :options="[\'a\' => \'A\']" />', 'form-select', true],
    'checkbox' => ['<x-form-checkbox name="test" label="My Label" />', 'form-check-input', true],
    'submit' => ['<x-form-submit label="Save" />', 'btn', false],
]);

it('renders bootstrap-6 theme classes correctly using provisional config', function () {
    config(['form-components.framework' => 'bootstrap-6']);

    $view = (string) $this->blade('<x-form-input name="test" label="My Label" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $labelClasses = preg_split('/\s+/', $xpath->query('//label')->item(0)->getAttribute('class'));
    $inputClasses = preg_split('/\s+/', $xpath->query('//input[@name="test"]')->item(0)->getAttribute('class'));

    expect($labelClasses)->toContain('form-label');
    expect($labelClasses)->not->toContain('mfc-label');
    expect($inputClasses)->toContain('form-control');
    expect($inputClasses)->not->toContain('mfc-input');
});

it('renders bootstrap-6 baseline components without any mfc classes', function (string $markup, string $expected) {
    config(['form-components.framework' => 'bootstrap-6']);

    $classes = bootstrap6ClassTokens((string) $this->blade($markup));

    expect($classes)->toContain($expected);
    expect(array_filter($classes, fn (string $class) => str_starts_with($class, 'mfc-')))->toBeEmpty();
})->with('bootstrap6Baseline');

it('renders bootstrap-6 components with validation errors without any mfc classes', function (string $markup, string $expected, bool $invalid) {
    config(['form-components.framework' => 'bootstrap-6']);

    $errorBag = new ViewErrorBag;
    $errorBag->put('default', new MessageBag(['test' => ['The test field is required.']]));
    View::share('errors', $errorBag);

    $html = (string) $this->blade($markup);
    $classes = bootstrap6ClassTokens($html);

    expect($classes)->toContain($expected);
    expect(array_filter($classes, fn (string $class) => str_starts_with($class, 'mfc-')))->toBeEmpty();

    if ($invalid) {
        expect($classes)->toContain('is-invalid');
        expect($html)->toContain('The test field is required.');
    }
})->with('bootstrap6WithErrors');

it('can use a bootstrap-6 specific template override', function () {
    config(['form-components.framework' => 'bootstrap-6']);

    $path = sys_get_temp_dir().'/mfc_bs6_override_'.uniqid();
    mkdir($path.'/themes/bootstrap-6', 0777, true);
    file_put_contents(
        $path.'/themes/bootstrap-6/input.blade.php',
        '<div class="bs6-override"><input name="{{ $name }}" id="{{ $id }}" {{ $attributes }}></div>'
    );

    try {
        View::prependNamespace('mlbrgn-form-components', $path);

        $view = (string) $this->blade('<x-form-input name="override-test" data-foo="bar" />');
        expect($view)->toContain('bs6-override');
        expect($view)->toContain('name="override-test"');
        expect($view)->toContain('data-foo="bar"');
    } finally {
        \Illuminate\Support\Facades\File::deleteDirectory($path);
    }
});
