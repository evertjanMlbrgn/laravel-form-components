<x-form::preview.components.section id="form-errors-and-labels" title="Errors & Labels" description="Standalone components for labels, help text, and error messages.">
    <x-form::preview.components.example title="Labels">
        <x-slot:code_slot>
            @verbatim
<x-form-label for="my-input">Custom Label</x-form-label>
<x-form-label for="my-input" class="text-primary font-bold">Styled Label</x-form-label>
            @endverbatim
        </x-slot:code_slot>
        <x-form-label for="my-input">Custom Label</x-form-label>
        <div class="mt-2">
            <x-form-label for="my-input" class="text-primary font-bold">Styled Label</x-form-label>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Help Text">
        <x-slot:code_slot>
            @verbatim
<x-form-text>This is some help text for a form field.</x-form-text>
<x-form-text id="password-help">Passwords must be at least 8 characters.</x-form-text>
            @endverbatim
        </x-slot:code_slot>
        <x-form-text>This is some help text for a form field.</x-form-text>
        <x-form-text id="password-help">Passwords must be at least 8 characters.</x-form-text>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Error Messages">
        <x-slot:code_slot>
            @verbatim
<!-- Errors for a specific field -->
<x-form-errors name="email" />

<!-- Manual error message styling -->
<div class="invalid-feedback-custom">
    This is what an error message looks like.
</div>
            @endverbatim
        </x-slot:code_slot>
        @php
            // Mock errors for demonstration
            $bag = new \Illuminate\Support\MessageBag();
            $bag->add('email', 'The email address is already in use.');
            $errors = new \Illuminate\Support\ViewErrorBag();
            $errors->put('default', $bag);
        @endphp
        <div class="{{ theme_class('invalid_feedback') }}">
            {{ $errors->first('email') }}
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
