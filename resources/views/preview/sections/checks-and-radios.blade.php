<x-form::preview.components.section id="form-checks-and-radios" title="Checks and radios" description="Checkbox and radio components for selecting one or more options.">
    <x-form::preview.components.example title="Default (stacked)">
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox id="defaultCheck1" label="Default checkbox">
    @slot('help')
        Just some help text
    @endslot
</x-form-checkbox>
<x-form-checkbox id="defaultCheck2" label="Checked checkbox" checked/>
<x-form-checkbox id="defaultCheck3" label="Disabled checkbox" disabled/>
<x-form-radio name="exampleRadios" id="exampleRadios1" value="option1" label="Default radio" checked>
    @slot('help')
        Just some help text
    @endslot
</x-form-radio>
<x-form-radio name="exampleRadios" id="exampleRadios2" value="option2" label="Second default radio"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-checkbox id="defaultCheck1" label="Default checkbox">
            @slot('help')
                Just some help text
            @endslot
        </x-form-checkbox>
        <x-form-checkbox id="defaultCheck2" label="Checked checkbox" checked/>
        <x-form-checkbox id="defaultCheck3" label="Disabled checkbox" disabled/>
        <x-form-radio name="exampleRadios" id="exampleRadios1" value="option1" label="Default radio" checked>
            @slot('help')
                Just some help text
            @endslot
        </x-form-radio>
        <x-form-radio name="exampleRadios" id="exampleRadios2" value="option2" label="Second default radio"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Switches">
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox switch id="flexSwitchCheckDefault" label="Default switch checkbox input"/>
<x-form-checkbox switch id="flexSwitchCheckChecked" label="Checked switch checkbox input" checked/>
<x-form-checkbox switch id="flexSwitchCheckDisabled" label="Disabled switch checkbox input" disabled/>
<x-form-checkbox switch id="flexSwitchCheckCheckedDisabled" label="Disabled checked switch checkbox input" checked disabled/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-checkbox switch id="flexSwitchCheckDefault" label="Default switch checkbox input"/>
        <x-form-checkbox switch id="flexSwitchCheckChecked" label="Checked switch checkbox input" checked/>
        <x-form-checkbox switch id="flexSwitchCheckDisabled" label="Disabled switch checkbox input" disabled/>
        <x-form-checkbox switch id="flexSwitchCheckCheckedDisabled" label="Disabled checked switch checkbox input" checked disabled/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Hidden Zero Value">
        <p class="mb-3 small text-muted">Checkboxes by default do not submit a value if unchecked. Use <code>default-to-zero</code> to ensure a 0 is submitted.</p>
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox name="agrees" label="I agree" default-to-zero />
            @endverbatim
        </x-slot:code_slot>
        <x-form-checkbox name="agrees" label="I agree" default-to-zero />
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Inline">
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox inline id="inlineCheckbox1" value="option1" label="1"/>
<x-form-checkbox inline id="inlineCheckbox2" value="option2" label="2"/>

<x-form-radio inline name="inlineRadioOptions" id="inlineRadio1" value="option1" label="1"/>
<x-form-radio inline name="inlineRadioOptions" id="inlineRadio2" value="option2" label="2"/>
            @endverbatim
        </x-slot:code_slot>
        <div class="mb-3">
            <x-form-checkbox inline id="inlineCheckbox1" value="option1" label="1"/>
            <x-form-checkbox inline id="inlineCheckbox2" value="option2" label="2"/>
            <x-form-checkbox inline id="inlineCheckbox3" value="option3" label="3 (disabled)" disabled/>
        </div>
        <div>
            <x-form-radio inline name="inlineRadioOptions" id="inlineRadio1" value="option1" label="1"/>
            <x-form-radio inline name="inlineRadioOptions" id="inlineRadio2" value="option2" label="2"/>
            <x-form-radio inline name="inlineRadioOptions" id="inlineRadio3" value="option3" label="3 (disabled)" disabled/>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Toggle buttons">
        <x-slot:code_slot>
            @verbatim
<!-- Checkbox toggles -->
<x-form-checkbox toggle id="btn-check" label="Single toggle"/>
<x-form-checkbox toggle id="btn-check-2" label="Checked" checked/>
<x-form-checkbox toggle id="btn-check-3" label="Disabled" disabled/>

<!-- Radio toggles -->
<x-form-radio toggle name="toggle-options" id="toggle-option1" label="Checked" checked/>
<x-form-radio toggle name="toggle-options" id="toggle-option2" label="Radio"/>
<x-form-radio toggle name="toggle-options" id="toggle-option3" label="Disabled" disabled/>
            @endverbatim
        </x-slot:code_slot>
        <div class="d-flex flex-wrap gap-2 mb-3">
            <x-form-checkbox toggle id="btn-check" label="Single toggle" class-toggle-button="btn-preview-secondary"/>
            <x-form-checkbox toggle id="btn-check-2" label="Checked" checked class-toggle-button="btn-preview-secondary"/>
            <x-form-checkbox toggle id="btn-check-3" label="Disabled" toggle disabled class-toggle-button="btn-preview-secondary"/>
            <x-form-checkbox toggle id="btn-check-outlined" label="Outlined" class-toggle-button="btn-preview-outline-primary"/>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <x-form-radio toggle name="toggle-options" id="toggle-option1" label="Checked" checked class-toggle-button="btn-preview-primary"/>
            <x-form-radio toggle name="toggle-options" id="toggle-option2" label="Radio" class-toggle-button="btn-preview-primary"/>
            <x-form-radio toggle name="toggle-options" id="toggle-option3" label="Disabled" disabled class-toggle-button="btn-preview-primary"/>
            <x-form-radio toggle name="toggle-options-outlined" id="toggle-success-outlined" checked label="Outlined" class-toggle-button="btn-preview-outline-secondary"/>
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
