<x-form::preview.components.section id="form-buttons" title="Buttons">
    <x-form::preview.components.example title="Button Variants">
            <div class="d-flex flex-wrap gap-2">
                <x-form-button>Default Button</x-form-button>
                <x-form-button class="btn-preview-primary">Primary Button</x-form-button>
                <x-form-button class="btn-preview-secondary">Secondary Button</x-form-button>
                <x-form-button class="btn-preview-success">Success Button</x-form-button>
                <x-form-button class="btn-preview-danger">Danger Button</x-form-button>
                <x-form-button class="btn-preview-warning">Warning Button</x-form-button>
                <x-form-button class="btn-preview-info">Info Button</x-form-button>
                <x-form-button class="btn-preview-light">Light Button</x-form-button>
                <x-form-button class="btn-preview-dark">Dark Button</x-form-button>
                <x-form-button class="btn-preview-link">Link Button</x-form-button>
            </div>
        <x-slot:code>
            @verbatim
<x-form-button>Default Button</x-form-button>
<x-form-button class="btn-preview-primary">Primary Button</x-form-button>
<x-form-button class="btn-preview-outline-primary">Outline Button</x-form-button>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Outline Variants">
            <div class="d-flex flex-wrap gap-2">
                <x-form-button class="btn-preview-outline-primary">Primary Outline</x-form-button>
                <x-form-button class="btn-preview-outline-secondary">Secondary Outline</x-form-button>
                <x-form-button class="btn-preview-outline-success">Success Outline</x-form-button>
                <x-form-button class="btn-preview-outline-danger">Danger Outline</x-form-button>
            </div>
        <x-slot:code>
            @verbatim
<x-form-button class="btn-preview-outline-primary">Primary Outline</x-form-button>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Submit Button">
            <x-form-submit class="btn-preview-primary">Submit Form</x-form-submit>
        <x-slot:code>
            @verbatim
<x-form-submit class="btn-preview-primary">Submit Form</x-form-submit>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Sizes">
            <div class="d-flex flex-wrap align-items-center gap-2">
                <x-form-button class="btn-preview-primary btn-sm">Small Button</x-form-button>
                <x-form-button class="btn-preview-primary">Default Button</x-form-button>
                <x-form-button class="btn-preview-primary btn-lg">Large Button</x-form-button>
            </div>
        <x-slot:code>
            @verbatim
<x-form-button class="btn-preview-primary btn-sm">Small Button</x-form-button>
<x-form-button class="btn-preview-primary">Default Button</x-form-button>
<x-form-button class="btn-preview-primary btn-lg">Large Button</x-form-button>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="States">
            <div class="d-flex flex-wrap gap-2">
                <x-form-button class="btn-preview-primary" disabled>Disabled Button</x-form-button>
                <x-form-button class="btn-preview-primary active">Active Button</x-form-button>
            </div>
        <x-slot:code>
            @verbatim
<x-form-button class="btn-preview-primary" disabled>Disabled Button</x-form-button>
<x-form-button class="btn-preview-primary active">Active Button</x-form-button>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>
</x-form::preview.components.section>
