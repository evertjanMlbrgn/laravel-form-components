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

<!-- With validation -->
<x-form-form validation-mode="client-custom">
    <x-form-input-group class="mb-3">
        <x-form-input-group-text>Validation test</x-form-input-group-text>
        <x-form-input aria-label="Field 1" required />
        <x-form-input aria-label="Field 2" required invalid-feedback="Required!"/>
    </x-form-input-group>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group class="mb-3">
            <x-form-input-group-text>First and last name</x-form-input-group-text>
            <x-form-input aria-label="First name"/>
            <x-form-input aria-label="Last name"/>
        </x-form-input-group>
        <x-form-form validation-mode="client-custom">
            <x-form-input-group class="mb-3">
                <x-form-input-group-text>Validation test</x-form-input-group-text>
                <x-form-input aria-label="Field 1" required />
                <x-form-input aria-label="Field 2" required invalid-feedback="Required!"/>
            </x-form-input-group>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Input group labels and position">
        <x-slot:code_slot>
            @verbatim
<!-- Label outside input-group using attributes -->
<x-form-input-group id="input-group-label-1" for="input-group-1-input" label="Label outside of group" required help-text="Group help text">
    <x-form-input id="input-group-1-input" name="text" type="text" />
    <x-form-input-group-text>Addon</x-form-input-group-text>
</x-form-input-group>

<!-- Label at start (default) -->
<x-form-input-group class="mt-4">
    <x-form-input id="input-group-start" name="text" type="text" label="Label at start"/>
    <x-form-input-group-text>Addon</x-form-input-group-text>
</x-form-input-group>

<!-- Label at end (label-end) -->
<x-form-input-group class="mt-4">
    <x-form-input-group-text>Addon</x-form-input-group-text>
    <x-form-input id="input-group-end" name="text" type="text" label="Label at end" label-end/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input-group id="input-group-label-1" for="input-group-1-input" label="Label outside of group" required help-text="Group help text" class="mb-4">
            <x-form-input id="input-group-1-input" name="text" type="text" />
            <x-form-input-group-text>Addon</x-form-input-group-text>
        </x-form-input-group>

        <x-form-input-group class="mb-4">
            <x-form-input id="input-group-start" name="text" type="text" label="Label at start"/>
            <x-form-input-group-text>Addon</x-form-input-group-text>
        </x-form-input-group>

        <x-form-input-group class="mb-4">
            <x-form-input-group-text>Addon</x-form-input-group-text>
            <x-form-input id="input-group-end" name="text" type="text" label="Label at end" label-end/>
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
<!-- Font icons -->
<x-form-input-group-icon class-font-icon="bi bi-person" class="mb-3">
    <x-form-input placeholder="Username" aria-label="Username"/>
</x-form-input-group-icon>

<x-form-input-group-icon class-font-icon="bi bi-envelope" icon-position="end" class="mb-3">
    <x-form-input placeholder="Email" aria-label="Email"/>
</x-form-input-group-icon>

<!-- SVG icons -->
<x-form-input-group-icon icon-position="start">
    <x-form-input name="input-svg" value="SVG Icon at start"></x-form-input>
    @slot('iconSvg')
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
        </svg>
    @endslot
</x-form-input-group-icon>
            @endverbatim
        </x-slot:code_slot>
        <div class="mb-3">
            <x-form-input-group-icon class-font-icon="bi bi-person" class="mb-3">
                <x-form-input placeholder="Username" aria-label="Username"/>
            </x-form-input-group-icon>

            <x-form-input-group-icon class-font-icon="bi bi-envelope" icon-position="end" class="mb-3">
                <x-form-input placeholder="Email" aria-label="Email"/>
            </x-form-input-group-icon>
        </div>
        <div>
            <x-form-input-group-icon icon-position="start">
                <x-form-input name="input-svg" value="SVG Icon at start"></x-form-input>
                @slot('iconSvg')
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                    </svg>
                @endslot
            </x-form-input-group-icon>
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
