<x-form::preview.components.section id="form-checks-and-radios" title="Checks and radios" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/checks-radios/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Default (stacked)">
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox id="defaultCheck1" label="Default checkbox"/>
<x-form-checkbox id="defaultCheck2" label="Disabled checkbox" disabled/>
<x-form-radio name="exampleRadios" id="exampleRadios1" value="option1" label="Default radio" checked/>
<x-form-radio name="exampleRadios" id="exampleRadios2" value="option2" label="Second default radio"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-checkbox id="defaultCheck1" label="Default checkbox"/>
        <x-form-checkbox id="defaultCheck2" label="Disabled checkbox" disabled/>
        <x-form-radio name="exampleRadios" id="exampleRadios1" value="option1" label="Default radio" checked/>
        <x-form-radio name="exampleRadios" id="exampleRadios2" value="option2" label="Second default radio"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Switches">
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox switch id="flexSwitchCheckDefault" label="Default switch checkbox input"/>
<x-form-checkbox switch id="flexSwitchCheckChecked" label="Checked switch checkbox input" checked/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-checkbox switch id="flexSwitchCheckDefault" label="Default switch checkbox input"/>
        <x-form-checkbox switch id="flexSwitchCheckChecked" label="Checked switch checkbox input" checked/>
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
        <x-form-checkbox inline id="inlineCheckbox1" value="option1" label="1"/>
        <x-form-checkbox inline id="inlineCheckbox2" value="option2" label="2"/>
        <x-form-radio inline name="inlineRadioOptions" id="inlineRadio1" value="option1" label="1"/>
        <x-form-radio inline name="inlineRadioOptions" id="inlineRadio2" value="option2" label="2"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Toggle buttons">
        <x-slot:code_slot>
            @verbatim
<x-form-checkbox toggle id="btn-check" label="Single toggle" autocomplete="off"/>
<x-form-radio toggle name="options" id="option1" label="Checked" checked/>
<x-form-radio toggle name="options" id="option2" label="Radio" class-toggle-button="btn-secondary"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-checkbox toggle id="btn-check" label="Single toggle" autocomplete="off"/>
        <x-form-radio toggle name="options" id="option1" label="Checked" checked/>
        <x-form-radio toggle name="options" id="option2" label="Radio" class-toggle-button="btn-secondary"/>
    </x-form::preview.components.example>
</x-form::preview.components.section>
