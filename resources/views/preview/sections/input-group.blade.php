<x-form::preview.components.section id="form-input-group" title="Input group" description="Input groups allow you to extend form controls by adding text, buttons, icons or other elements.">
    <x-form::preview.components.example title="Basic example">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group>
    <x-form-input-group-text>@</x-form-input-group-text>
    <x-form-input placeholder="Username" aria-label="Username"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group>
                <x-form-input-group-text id="basic-addon1">@</x-form-input-group-text>
                <x-form-input placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"/>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Checkboxes and radios">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group>
    <x-form-input-group-text>
        <x-form-checkbox label="" id="check1"/>
    </x-form-input-group-text>
    <x-form-input aria-label="Text input with checkbox"/>
</x-form-input-group>

<x-form-input-group>
    <x-form-input-group-text>
        <x-form-radio label="" id="radio1" name="group-radio"/>
    </x-form-input-group-text>
    <x-form-input aria-label="Text input with radio"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group>
                <x-form-input-group-text>
                    <x-form-checkbox label="" id="check1"/>
                </x-form-input-group-text>
                <x-form-input aria-label="Text input with checkbox"/>
            </x-form-input-group>
            <x-form-input-group>
                <x-form-input-group-text>
                    <x-form-radio label="" id="radio1" name="group-radio"/>
                </x-form-input-group-text>
                <x-form-input aria-label="Text input with radio"/>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multiple inputs">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group>
    <x-form-input-group-text>First and last name</x-form-input-group-text>
    <x-form-input aria-label="First name"/>
    <x-form-input aria-label="Last name"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group>
                <x-form-input-group-text>First and last name</x-form-input-group-text>
                <x-form-input aria-label="First name"/>
                <x-form-input aria-label="Last name"/>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Input group labels and position">
        <x-slot:code_slot>
            @verbatim
<!-- Label outside input-group using attributes -->
<x-form-input-group label="Label outside of group" required help-text="Group help text">
    <x-form-input name="text" type="text" />
    <x-form-input-group-text>Addon</x-form-input-group-text>
</x-form-input-group>

<!-- Label at start (default) -->
<x-form-input-group>
    <x-form-input name="text" type="text" label="Label at start"/>
    <x-form-input-group-text>Addon</x-form-input-group-text>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group label="Label outside of group" required help-text="Group help text">
                <x-form-input id="input-group-1-input" name="text" type="text" />
                <x-form-input-group-text>Addon</x-form-input-group-text>
            </x-form-input-group>

            <x-form-input-group>
                <x-form-input id="input-group-start" name="text" type="text" label="Label at start"/>
                <x-form-input-group-text>Addon</x-form-input-group-text>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Label end (trailing addon)">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group>
    <x-form-input-group-text>Prefix</x-form-input-group-text>
    <x-form-input label="Suffix" label-end aria-label="Input with trailing label"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group>
                <x-form-input-group-text>Prefix</x-form-input-group-text>
                <x-form-input label="Suffix" label-end aria-label="Input with trailing label"/>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multiple addons">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group>
    <x-form-input-group-text>$</x-form-input-group-text>
    <x-form-input-group-text>0.00</x-form-input-group-text>
    <x-form-input aria-label="Amount"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group>
                <x-form-input-group-text>$</x-form-input-group-text>
                <x-form-input-group-text>0.00</x-form-input-group-text>
                <x-form-input aria-label="Amount"/>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Button addons">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group>
    <x-form-button>Button</x-form-button>
    <x-form-input placeholder="Search..." aria-label="Search"/>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group>
                <x-form-button>Button</x-form-button>
                <x-form-input placeholder="Search..." aria-label="Search"/>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="File browser">
        <x-slot:code_slot>
            @verbatim
<x-form-input-group>
    <x-form-input-group-text>Upload</x-form-input-group-text>
    <x-form-input type="file" id="inputGroupFile01"/>
</x-form-input-group>

<x-form-input-group>
    <x-form-input type="file" id="inputGroupFile02"/>
    <x-form-button>Button</x-form-button>
</x-form-input-group>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group>
                <x-form-input-group-text>Upload</x-form-input-group-text>
                <x-form-input type="file" id="inputGroupFile01"/>
            </x-form-input-group>

            <x-form-input-group>
                <x-form-input type="file" id="inputGroupFile02"/>
                <x-form-button>Button</x-form-button>
            </x-form-input-group>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Input group with icons">
        <x-slot:code_slot>
            @verbatim
<!-- Font icons -->
<x-form-input-group-icon class-font-icon="bi bi-person">
    <x-form-input placeholder="Username" aria-label="Username"/>
</x-form-input-group-icon>

<x-form-input-group-icon class-font-icon="bi bi-envelope" icon-position="end">
    <x-form-input placeholder="Email" aria-label="Email"/>
</x-form-input-group-icon>

<!-- SVG icons -->
<x-form-input-group-icon icon-position="start">
    <x-form-input name="input-svg" value="SVG Icon at start"></x-form-input>
    @slot('iconSvg')
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        </svg>
    @endslot
</x-form-input-group-icon>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-stack">
            <x-form-input-group-icon class-font-icon="bi bi-person">
                <x-form-input placeholder="Username" aria-label="Username"/>
            </x-form-input-group-icon>

            <x-form-input-group-icon class-font-icon="bi bi-envelope" icon-position="end">
                <x-form-input placeholder="Email" aria-label="Email"/>
            </x-form-input-group-icon>

            <x-form-input-group-icon icon-position="start">
                <x-form-input name="input-svg" value="SVG Icon at start"></x-form-input>
                @slot('iconSvg')
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    </svg>
                @endslot
            </x-form-input-group-icon>
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
