<x-form::preview.components.section id="form-input-group" title="Input group" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/input-group/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Basic example">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="mb-3">
    <x-form-input-group-text id="basic-addon1">@</x-form-input-group-text>
    <x-form-input placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text id="basic-addon1">@</x-form-input-group-text>
            <x-form-input placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"/>
        </x-form-input-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Sizing">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="input-group-sm mb-3">
    <x-form-input-group-text id="inputGroup-sizing-sm">Small</x-form-input-group-text>
    <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="input-group-sm mb-3">
            <x-form-input-group-text id="inputGroup-sizing-sm">Small</x-form-input-group-text>
            <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"/>
        </x-form-input-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Checkboxes and radios">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="mb-3">
    <x-form-input-group-text>
        <x-form-checkbox class="mt-0" label="" id="check1"/>
    </x-form-input-group-text>
    <x-form-input aria-label="Text input with checkbox"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text>
                <x-form-checkbox class="mt-0" label="" id="check1"/>
            </x-form-input-group-text>
            <x-form-input aria-label="Text input with checkbox"/>
        </x-form-input-group>
    </x-form::preview.components.example>
</x-form::preview.components.section>
