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

<x-form-input-group class="input-group-lg">
    <x-form-input-group-text id="inputGroup-sizing-lg">Large</x-form-input-group-text>
    <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="input-group-sm mb-3">
            <x-form-input-group-text id="inputGroup-sizing-sm">Small</x-form-input-group-text>
            <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"/>
        </x-form-input-group>
        <x-form-input-group class="input-group-lg">
            <x-form-input-group-text id="inputGroup-sizing-lg">Large</x-form-input-group-text>
            <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"/>
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

<x-form-input-group>
    <x-form-input-group-text>
        <x-form-radio class="mt-0" label="" id="radio1" name="group-radio"/>
    </x-form-input-group-text>
    <x-form-input aria-label="Text input with radio"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text>
                <x-form-checkbox class="mt-0" label="" id="check1"/>
            </x-form-input-group-text>
            <x-form-input aria-label="Text input with checkbox"/>
        </x-form-input-group>
        <x-form-input-group>
            <x-form-input-group-text>
                <x-form-radio class="mt-0" label="" id="radio1" name="group-radio"/>
            </x-form-input-group-text>
            <x-form-input aria-label="Text input with radio"/>
        </x-form-input-group>
    </x-form::preview.components.example>
    <x-form::preview.components.example title="Multiple inputs">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="mb-3">
    <x-form-input-group-text>First and last name</x-form-input-group-text>
    <x-form-input aria-label="First name"/>
    <x-form-input aria-label="Last name"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text>First and last name</x-form-input-group-text>
            <x-form-input aria-label="First name"/>
            <x-form-input aria-label="Last name"/>
        </x-form-input-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multiple addons">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="mb-3">
    <x-form-input-group-text>$</x-form-input-group-text>
    <x-form-input-group-text>0.00</x-form-input-group-text>
    <x-form-input aria-label="Dollar amount (with dot and two decimal places)"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text>$</x-form-input-group-text>
            <x-form-input-group-text>0.00</x-form-input-group-text>
            <x-form-input aria-label="Dollar amount (with dot and two decimal places)"/>
        </x-form-input-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Button addons">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="mb-3">
    <x-form-button class="btn-preview-outline-secondary" id="button-addon1">Button</x-form-button>
    <x-form-input placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1"/>
</x-form-input-group>

<x-form-input-group class="mb-3">
    <x-form-input placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"/>
    <x-form-button class="btn-preview-outline-secondary" id="button-addon2">Button</x-form-button>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-button class="btn-preview-outline-secondary" id="button-addon1">Button</x-form-button>
            <x-form-input placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1"/>
        </x-form-input-group>

        <x-form-input-group class="mb-3">
            <x-form-input placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"/>
            <x-form-button class="btn-preview-outline-secondary" id="button-addon2">Button</x-form-button>
        </x-form-input-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Label End (Trailing Addon)">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="mb-3">
    <x-form-input-group-text>Prefix</x-form-input-group-text>
    <x-form-input label="Suffix" label-end aria-label="Input with trailing label"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text>Prefix</x-form-input-group-text>
            <x-form-input label="Suffix" label-end aria-label="Input with trailing label"/>
        </x-form-input-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="File browser">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group class="mb-3">
    <x-form-input-group-text>Upload</x-form-input-group-text>
    <x-form-input type="file" id="inputGroupFile01"/>
</x-form-input-group>

<x-form-input-group>
    <x-form-input type="file" id="inputGroupFile02"/>
    <x-form-button class="btn-preview-outline-secondary">Button</x-form-button>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text>Upload</x-form-input-group-text>
            <x-form-input type="file" id="inputGroupFile01"/>
        </x-form-input-group>

        <x-form-input-group>
            <x-form-input type="file" id="inputGroupFile02"/>
            <x-form-button class="btn-preview-outline-secondary">Button</x-form-button>
        </x-form-input-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Input group with icons">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group-icon class-font-icon="bi bi-person" class="mb-3">
    <x-form-input placeholder="Username" aria-label="Username"/>
</x-form-input-group-icon>

<x-form-input-group-icon class-font-icon="bi bi-envelope" icon-position="end">
    <x-form-input placeholder="Email" aria-label="Email"/>
</x-form-input-group-icon>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group-icon class-font-icon="bi bi-person" class="mb-3">
            <x-form-input placeholder="Username" aria-label="Username"/>
        </x-form-input-group-icon>

        <x-form-input-group-icon class-font-icon="bi bi-envelope" icon-position="end">
            <x-form-input placeholder="Email" aria-label="Email"/>
        </x-form-input-group-icon>
    </x-form::preview.components.example>
</x-form::preview.components.section>
