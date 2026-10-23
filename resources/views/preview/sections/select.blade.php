<x-form::preview.components.section id="form-select" title="Select" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/select/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
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
<x-form-select class="form-select-lg" :options="$selectOptions"/>
<x-form-select class="form-select-sm" :options="$selectOptions"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-select class="form-select-lg" aria-label=".form-select-lg example" :options="$selectOptions" placeholder="Open this select menu"/>
        <x-form-select class="form-select-sm" aria-label=".form-select-sm example" :options="$selectOptions" placeholder="Open this select menu"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multiple and Size">
        <x-slot:code_slot>
            @verbatim
<x-form-select multiple :options="$selectOptions"/>
<x-form-select size="3" :options="$selectOptions"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-select multiple aria-label="multiple select example" :options="$selectOptions"/>
        <x-form-select size="3" aria-label="size 3 select example" :options="$selectOptions"/>
    </x-form::preview.components.example>
</x-form::preview.components.section>
