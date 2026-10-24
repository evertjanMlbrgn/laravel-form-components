<x-form::preview.components.section id="form-buttons" title="Buttons" description="Button and submit components for actions and form submission.">
    <x-form::preview.components.example title="Basic Usage">
        <div class="d-flex flex-wrap gap-2">
            <x-form-button id="btn-default">Default Button</x-form-button>
            <x-form-button id="btn-label" label="Button with Label Prop" />
            <x-form-button id="btn-reset" type="reset">Reset Button</x-form-button>
        </div>
        <x-slot:code_slot>
            @verbatim
<x-form-button>Default Button</x-form-button>
<x-form-button label="Button with Label Prop" />
<x-form-button type="reset">Reset Button</x-form-button>
            @endverbatim
        </x-slot:code_slot>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Submit Button">
        <div class="d-flex flex-wrap gap-2">
            <x-form-submit id="btn-submit">Submit Form</x-form-submit>
            <x-form-submit id="btn-submit-label" label="Submit with Label Prop" />
        </div>
        <x-slot:code_slot>
            @verbatim
<x-form-submit>Submit Form</x-form-submit>
<x-form-submit label="Submit with Label Prop" />
            @endverbatim
        </x-slot:code_slot>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Variants and Classes">
        <div class="d-flex flex-wrap gap-2">
            <x-form-button class="btn-preview-primary">Primary Button</x-form-button>
            <x-form-button class="btn-preview-secondary">Secondary Button</x-form-button>
            <x-form-button class="btn-preview-outline-primary">Outline Primary</x-form-button>
            <x-form-submit class="btn-preview-success">Success Submit</x-form-submit>
        </div>
        <x-slot:code_slot>
            @verbatim
<x-form-button class="btn-primary">Primary Button</x-form-button>
<x-form-button class="btn-secondary">Secondary Button</x-form-button>
<x-form-button class="btn-outline-primary">Outline Primary</x-form-button>
<x-form-submit class="btn-success">Success Submit</x-form-submit>
            @endverbatim
        </x-slot:code_slot>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Help Text">
        <div class="d-flex flex-column gap-3">
            <x-form-button id="btn-help-attr" help-text="Help text provided via attribute">Button with help text</x-form-button>
            <x-form-submit id="btn-help-slot">
                Submit Form
                @slot('help')
                    Help text provided via slot
                @endslot
            </x-form-submit>
        </div>
        <x-slot:code_slot>
            @verbatim
<x-form-button help-text="Help text provided via attribute">Button with help text</x-form-button>

<x-form-submit>
    Submit Form
    @slot('help')
        Help text provided via slot
    @endslot
</x-form-submit>
            @endverbatim
        </x-slot:code_slot>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="States">
        <div class="d-flex flex-wrap gap-2">
            <x-form-button id="btn-disabled" disabled>Disabled Button</x-form-button>
            <x-form-submit id="btn-submit-disabled" disabled>Disabled Submit</x-form-submit>
        </div>
        <x-slot:code_slot>
            @verbatim
<x-form-button disabled>Disabled Button</x-form-button>
<x-form-submit disabled>Disabled Submit</x-form-submit>
            @endverbatim
        </x-slot:code_slot>
    </x-form::preview.components.example>
</x-form::preview.components.section>
