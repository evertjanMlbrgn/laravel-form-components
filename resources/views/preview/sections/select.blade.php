<x-form::preview.components.section id="form-select" title="Select" description="Select components for choosing options from a dropdown menu.">
    <x-form::preview.components.example title="Default">
        <x-slot:code_slot>
            @verbatim
<x-form-select label="Default select example" :options="$selectOptions" placeholder="Open this select menu"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-select label="Default select example" :options="$selectOptions" placeholder="Open this select menu"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Sizing">
        <x-slot:code_slot>
            @verbatim
<x-form-select class="form-select-lg-custom" :options="$selectOptions"/>
<x-form-select class="form-select-sm-custom" :options="$selectOptions"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-select :class="theme_class('form_select_lg')" class="mb-3" aria-label="Large select example" :options="$selectOptions" placeholder="Open this select menu"/>
        <x-form-select :class="theme_class('form_select_sm')" aria-label="Small select example" :options="$selectOptions" placeholder="Open this select menu"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multiple and Size">
        <x-slot:code_slot>
            @verbatim
<x-form-select multiple :options="$selectOptions"/>
<x-form-select size="3" :options="$selectOptions"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-select multiple aria-label="multiple select example" :options="$selectOptions" class="mb-3"/>
        <x-form-select size="3" aria-label="size 3 select example" :options="$selectOptions"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Disabled">
        <x-slot:code_slot>
            @verbatim
<x-form-select disabled :options="$selectOptions" placeholder="Open this select menu"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-select disabled aria-label="Disabled select example" :options="$selectOptions" placeholder="Open this select menu"/>
    </x-form::preview.components.example>
</x-form::preview.components.section>
