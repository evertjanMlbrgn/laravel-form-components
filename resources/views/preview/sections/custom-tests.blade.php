<x-form::preview.components.section id="form-custom-tests" title="Custom tests">
    <x-form::preview.components.example title="Value Precedence">
        <x-slot:code_slot>
            @verbatim
<x-form-input name="precedence" value="Component Value" label="Should show 'Old Value' if flash present"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input name="precedence" value="Component Value" label="Should show 'Old Value' if flash present"/>
    </x-form::preview.components.example>
</x-form::preview.components.section>
