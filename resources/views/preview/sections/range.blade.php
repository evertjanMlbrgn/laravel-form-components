<x-form::preview.components.section id="form-range" title="Range" description="Range inputs for selecting a value from a specific range.">
    <x-form::preview.components.example title="Default">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="range" id="customRange1" label="Example range"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="range" id="customRange1" label="Example range"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Min and max">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="range" min="0" max="5" id="customRange2" label="Min and max range"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="range" min="0" max="5" id="customRange2" label="Min and max range"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Steps">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="range" min="0" max="5" step="0.5" id="customRange3" label="Step range"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="range" min="0" max="5" step="0.5" id="customRange3" label="Step range"/>
    </x-form::preview.components.example>
</x-form::preview.components.section>
