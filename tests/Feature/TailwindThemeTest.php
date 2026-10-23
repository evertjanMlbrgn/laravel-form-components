<?php

use Mlbrgn\LaravelFormComponents\Theme\Theme;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

it('renders tailwind theme classes correctly', function () {
    config(['form-components.framework' => 'tailwind']);

    $view = (string) $this->blade('<x-form-input name="test" label="My Label" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    // Label class
    $label = $xpath->query('//label')->item(0);
    expect($label->getAttribute('class'))->toContain('block', 'text-sm', 'font-medium', 'text-gray-700');

    // Input class
    $input = $xpath->query('//input[@name="test"]')->item(0);
    expect($input->getAttribute('class'))->toContain('rounded-md', 'border-gray-300', 'shadow-sm');

    // Group wrapper class (mb-4)
    $wrapper = $xpath->query('//div[contains(@class, "mb-4")]')->item(0);
    expect($wrapper)->not->toBeNull();
});

it('renders daisyui theme classes correctly', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-input name="test" label="My Label" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    // Label class
    $label = $xpath->query('//label')->item(0);
    expect($label->getAttribute('class'))->toContain('label-text');

    // Input class
    $input = $xpath->query('//input[@name="test"]')->item(0);
    expect($input->getAttribute('class'))->toContain('input', 'input-bordered', 'w-full');

    // Group wrapper
    $wrapper = $xpath->query('//div[contains(@class, "form-control")]')->item(0);
    expect($wrapper)->not->toBeNull();
});

it('verifies daisyui checkbox specialized template structure and parity', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Remember me" required help-text="Help text" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    // Check structure: label > span.label-text + input
    $label = $xpath->query('//label[contains(@class, "label cursor-pointer")]')->item(0);
    expect($label)->not->toBeNull();
    expect($xpath->query('./span[contains(@class, "label-text")]', $label)->length)->toBe(1);
    expect($xpath->query('./input[@type="checkbox"]', $label)->length)->toBe(1);

    // Required marker comes only from label.required (CSS ::after), never from an explicit asterisk span
    expect($xpath->query('//span[normalize-space(text())="*"]')->length)->toBe(0);

    // required class token on label
    expect(preg_split('/\s+/', trim($label->getAttribute('class'))))->toContain('required');

    // Parity: Help text and accessibility
    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    $helpId = $input->getAttribute('aria-describedby');
    // dump($helpId);
    expect($helpId)->not->toBeEmpty();
    expect($helpId)->toContain('-help-text');

    $helpText = $xpath->query('//div[contains(@id, "-help-text")]')->item(0);
    expect($helpText->textContent)->toContain('Help text');
});

it('applies granular invalid classes for daisyui', function () {
    config(['form-components.framework' => 'daisyui']);
    $errors = new MessageBag(['test' => ['Error']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = (string) $this->blade('<x-form-input name="test" /><x-form-select name="test" :options="[]" /><x-form-textarea name="test" /><x-form-checkbox name="test" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    expect($xpath->query('//input[@name="test"][contains(@class, "input-error")]')->length)->toBe(1);
    expect($xpath->query('//select[@name="test"][contains(@class, "select-error")]')->length)->toBe(1);
    expect($xpath->query('//textarea[@name="test"][contains(@class, "textarea-error")]')->length)->toBe(1);
    expect($xpath->query('//input[@type="checkbox"][contains(@class, "checkbox-error")]')->length)->toBe(1);
});

it('falls back to is-invalid for bootstrap 5', function () {
    config(['form-components.framework' => 'bootstrap-5']);
    $errors = new MessageBag(['test' => ['Error']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = (string) $this->blade('<x-form-input name="test" /><x-form-select name="test" :options="[]" /><x-form-textarea name="test" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    expect($xpath->query('//input[@name="test"][contains(@class, "is-invalid")]')->length)->toBe(1);
    expect($xpath->query('//select[@name="test"][contains(@class, "is-invalid")]')->length)->toBe(1);
    expect($xpath->query('//textarea[@name="test"][contains(@class, "is-invalid")]')->length)->toBe(1);
});

it('avoids extra wrapper div inside input-group for utility frameworks', function () {
    foreach (['tailwind', 'daisyui'] as $framework) {
        config(['form-components.framework' => $framework]);
        $view = (string) $this->blade('<x-form-input-group><x-form-input name="a" /><x-form-select name="b" :options="[]" /></x-form-input-group><x-form-input name="after" />');
        $dom = new DOMDocument();
        @$dom->loadHTML($view);
        $xpath = new DOMXPath($dom);

        // Nested inputs should NOT have wrapper divs (mb-4 or form-control)
        // Group wrapper check: find the group
        $inputGroupClass = Theme::resolve('input_group');
        $group = $xpath->query("//div[contains(@class, '{$inputGroupClass}')]")->item(0);
        
        expect($group)->not->toBeNull("Input group not found for framework: {$framework}");

        // Find inputs inside group
        $nestedInputs = $xpath->query('.//input | .//select', $group);
        foreach ($nestedInputs as $input) {
            $parent = $input->parentNode;
            // The parent of the input should be the group or a direct descendant, not an wrapper div (div class="mb-4")
            expect($parent)->toBe($group);
        }

        // Sibling wrapper check
        $afterInput = $xpath->query('//input[@name="after"]')->item(0);
        $afterParent = $afterInput->parentNode;
        expect($afterParent->getAttribute('class'))->toContain('mb-4'); // Tailwind/DaisyUI default
    }
});

it('does not leak mfc classes when using theme', function () {
    foreach (['tailwind', 'daisyui'] as $framework) {
        config(['form-components.framework' => $framework]);
        $view = (string) $this->blade('<x-form-input name="test" label="L" /><x-form-select name="s" :options="[]" /><x-form-checkbox name="c" /><x-form-radio name="r" /><x-form-textarea name="t" />');
        $dom = new DOMDocument();
        @$dom->loadHTML($view);
        $xpath = new DOMXPath($dom);
        
        $elements = $xpath->query('//*[contains(@class, "mfc-")]');
        expect($elements->length)->toBe(0);
    }
});

it('renders daisyui switch correctly using switch attribute', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Switch me" switch />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    expect($input->getAttribute('class'))->toContain('toggle');
    expect($input->getAttribute('class'))->not->toContain('checkbox');
});

it('renders daisyui toggle button correctly using toggle attribute', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Toggle button" toggle />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    expect($input->getAttribute('class'))->toContain('sr-only', 'peer');

    $label = $xpath->query('//label[contains(@class, "btn")]')->item(0);
    expect($label->getAttribute('class'))->toContain('peer-checked:btn-primary');
});

it('renders tailwind toggle button correctly', function () {
    config(['form-components.framework' => 'tailwind']);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Toggle me" toggle />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    expect($input->getAttribute('class'))->toContain('sr-only', 'peer');

    $label = $xpath->query('//label')->item(0);
    expect($label->getAttribute('class'))->toContain('peer-checked:bg-indigo-600');
});

it('renders radios correctly with distinct classes in daisyui', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-radio name="test" label="Option 1" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $input = $xpath->query('//input[@type="radio"]')->item(0);
    expect($input->getAttribute('class'))->toBe('radio');
    expect($input->getAttribute('class'))->not->toContain('checkbox');
});

it('renders textarea with correct classes in daisyui', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-textarea name="test" label="Description" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $textarea = $xpath->query('//textarea')->item(0);
    expect($textarea->getAttribute('class'))->toContain('textarea', 'textarea-bordered');
    expect($textarea->getAttribute('class'))->not->toContain('input');
});

it('renders horizontal layout correctly in tailwind without grid conflicts', function () {
    config(['form-components.framework' => 'tailwind']);

    $view = (string) $this->blade('<x-form-input name="test" label="Horizontal" horizontal />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $label = $xpath->query('//label')->item(0);
    $labelClasses = $label->getAttribute('class');

    // Should have sm:col-span-2 (from wrapper_horizontal_label)
    // Should NOT have sm:col-span-3 (which was in form_label_horizontal)
    expect($labelClasses)->toContain('sm:col-span-2');
    expect($labelClasses)->not->toContain('sm:col-span-3');

    $wrapper = $xpath->query('//div[contains(@class, "sm:col-span-4")]')->item(0);
    expect($wrapper)->not->toBeNull();
});

it('verifies accessibility attributes and errors in daisyui checkbox', function () {
    config(['form-components.framework' => 'daisyui']);

    $errors = new MessageBag(['test' => ['The test field is required.']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Agree" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    expect($input->getAttribute('aria-describedby'))->toContain('-error');

    $errorDiv = $xpath->query('//div[contains(@id, "-error")]')->item(0);
    expect($errorDiv->textContent)->toContain('The test field is required.');
});

it('supports class-label on daisyui checkbox', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Custom Label Class" class-label="custom-label-class" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $label = $xpath->query('//label')->item(0);
    expect($label->getAttribute('class'))->toContain('custom-label-class');
});

it('does not render empty label in daisyui checkbox when no label or slot is provided', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-checkbox name="test" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $label = $xpath->query('//label')->item(0);
    expect($label)->toBeNull();

    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    expect($input)->not->toBeNull();
});

it('renders daisyui radio using specialized template with correct structure to avoid stacking', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-radio name="test" label="Radio Option" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    // Structure should be label > span.label-text + input (like checkbox)
    $label = $xpath->query('//label[contains(@class, "label")]')->item(0);
    expect($label)->not->toBeNull();
    expect($xpath->query('./span[contains(@class, "label-text")]', $label)->length)->toBe(1);
    expect($xpath->query('./input[@type="radio"]', $label)->length)->toBe(1);
});

it('renders tailwind switch with proper utility classes', function () {
    config(['form-components.framework' => 'tailwind']);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Tailwind Switch" switch />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    $classes = preg_split('/\s+/', trim($input->getAttribute('class')));

    expect($classes)->toContain('appearance-none', 'w-9', 'h-5', 'rounded-full', 'before:absolute', 'checked:bg-indigo-600', 'checked:bg-none', 'checked:before:translate-x-4', 'text-indigo-600');
    expect($classes)->not->toContain('checkbox');
    expect($input->getAttribute('class'))->not->toContain('before:content');
});

it('renders daisyui checkbox slot content inside the label-text span', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Plain"><b>Bold slot</b></x-form-checkbox>');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $span = $xpath->query('//label/span[contains(concat(" ", normalize-space(@class), " "), " label-text ")]')->item(0);
    expect($span)->not->toBeNull();
    expect($xpath->query('./b', $span)->length)->toBe(1);
    expect($span->textContent)->toContain('Plain');
    expect($span->textContent)->toContain('Bold slot');
});

it('applies class-label and required to the daisyui radio label without an explicit asterisk', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-radio name="test" label="Option" required class-label="radio-custom" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $label = $xpath->query('//label')->item(0);
    $labelClasses = preg_split('/\s+/', trim($label->getAttribute('class')));

    expect($labelClasses)->toContain('label', 'radio-custom', 'required');
    expect($xpath->query('./input[@type="radio"]', $label)->length)->toBe(1);
    expect($xpath->query('//span[normalize-space(text())="*"]')->length)->toBe(0);
});

it('does not render a label for a daisyui radio without label or slot', function () {
    config(['form-components.framework' => 'daisyui']);

    $view = (string) $this->blade('<x-form-radio name="test" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    expect($xpath->query('//label')->length)->toBe(0);
    expect($xpath->query('//input[@type="radio"]')->length)->toBe(1);
});

it('applies toggle-error to a daisyui switch with a validation error', function () {
    config(['form-components.framework' => 'daisyui']);

    $errors = new MessageBag(['test' => ['The test field is required.']]);
    $viewErrorBag = new ViewErrorBag;
    $viewErrorBag->put('default', $errors);
    View::share('errors', $viewErrorBag);

    $view = (string) $this->blade('<x-form-checkbox name="test" label="Switch" switch />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    $input = $xpath->query('//input[@type="checkbox"]')->item(0);
    $classes = preg_split('/\s+/', trim($input->getAttribute('class')));

    expect($classes)->toContain('toggle', 'toggle-error');
    expect($classes)->not->toContain('checkbox-error');
    expect($classes)->not->toContain('input-error');
});

it('does not leak mfc classes when using tailwind theme', function () {
    config(['form-components.framework' => 'tailwind']);

    $view = (string) $this->blade('<x-form-input name="test" label="No Leakage" />');
    
    expect($view)->not->toContain('mfc-field');
    expect($view)->not->toContain('mfc-label');
    expect($view)->not->toContain('mfc-input');
});

it('respects structural flags in tailwind theme', function () {
    config(['form-components.framework' => 'tailwind']);
    // tailwind has use_group_wrapper => true, use_input_wrapper => false
    
    $view = (string) $this->blade('<x-form-input name="test" label="Structural" />');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    // Group wrapper (mb-4) should exist
    $wrapper = $xpath->query('//div[contains(@class, "mb-4")]')->item(0);
    expect($wrapper)->not->toBeNull();
    
    // Input wrapper should NOT exist (use_input_wrapper is false)
    // The input should be a direct child of the group wrapper (mb-4)
    $input = $xpath->query('//input[@name="test"]')->item(0);
    expect($input->parentNode)->toBe($wrapper);
});

it('avoids extra wrapper div inside input-group for tailwind', function () {
    config(['form-components.framework' => 'tailwind']);
    
    $view = (string) $this->blade('<x-form-input-group name="test" label="Group"><x-form-input name="test" /></x-form-input-group>');
    $dom = new DOMDocument();
    @$dom->loadHTML($view);
    $xpath = new DOMXPath($dom);

    // There should be exactly one .input-group div (or equivalent tailwind class)
    $inputGroupClass = Theme::resolve('input_group');
    $inputGroup = $xpath->query("//div[contains(@class, '{$inputGroupClass}')]")->item(0);
    expect($inputGroup)->not->toBeNull();

    // Inside .input-group, the input should NOT be wrapped in another div (no mb-4)
    $innerWrapper = $xpath->query('.//div[contains(@class, "mb-4")]', $inputGroup);
    expect($innerWrapper->length)->toBe(0);
    
    $input = $xpath->query('.//input[@name="test"]', $inputGroup)->item(0);
    expect($input)->not->toBeNull();
});
