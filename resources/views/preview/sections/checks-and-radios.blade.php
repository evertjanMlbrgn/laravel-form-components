<x-form::preview.components.section id="form-checks-and-radios" title="Checks and radios" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/checks-radios/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
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

    <x-form::preview.components.example title="Inline">
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox inline id="inlineCheckbox1" value="option1" label="1"/>
<x-form-checkbox inline id="inlineCheckbox2" value="option2" label="2"/>
<x-form-checkbox inline id="inlineCheckbox3" value="option3" label="3 (disabled)" disabled/>

<x-form-radio inline name="inlineRadioOptions" id="inlineRadio1" value="option1" label="1"/>
<x-form-radio inline name="inlineRadioOptions" id="inlineRadio2" value="option2" label="2"/>
<x-form-radio inline name="inlineRadioOptions" id="inlineRadio3" value="option3" label="3 (disabled)" disabled/>
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
<x-form-checkbox toggle id="btn-check" label="Single toggle" class-toggle-button="btn-preview-secondary"/>
<x-form-checkbox toggle id="btn-check-2" label="Checked" checked class-toggle-button="btn-preview-secondary"/>
<x-form-checkbox toggle id="btn-check-outlined" label="Outlined" class-toggle-button="btn-preview-outline-primary"/>

<!-- Radio toggles -->
<x-form-radio toggle name="options" id="option1" label="Checked" checked class-toggle-button="btn-preview-primary"/>
<x-form-radio toggle name="options" id="option2" label="Radio" class-toggle-button="btn-preview-primary"/>
<x-form-radio toggle name="options-outlined" id="success-outlined" checked label="Outlined success" class-toggle-button="btn-preview-outline-secondary"/>
            @endverbatim
        </x-slot:code_slot>
        <div class="d-flex flex-wrap gap-2 mb-3">
            <x-form-checkbox toggle id="btn-check" label="Single toggle" class-toggle-button="btn-preview-secondary"/>
            <x-form-checkbox toggle id="btn-check-2" label="Checked" checked class-toggle-button="btn-preview-secondary"/>
            <x-form-checkbox toggle id="btn-check-3" label="Disabled" toggle disabled class-toggle-button="btn-preview-secondary"/>
            <x-form-checkbox toggle id="btn-check-outlined" label="Outlined" class-toggle-button="btn-preview-outline-primary"/>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <x-form-radio toggle name="options" id="option1" label="Checked" checked class-toggle-button="btn-preview-primary"/>
            <x-form-radio toggle name="options" id="option2" label="Radio" class-toggle-button="btn-preview-primary"/>
            <x-form-radio toggle name="options" id="option3" label="Disabled" disabled class-toggle-button="btn-preview-primary"/>
            <x-form-radio toggle name="options-outlined" id="success-outlined" checked label="Outlined success" class-toggle-button="btn-preview-outline-secondary"/>
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
