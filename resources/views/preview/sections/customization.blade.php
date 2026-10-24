<x-form::preview.components.section id="form-customization" title="Customization">
    <p>Additional custom tests and debug scenarios.</p>

    <x-form::preview.components.example title="Hidden attributes">
        <x-slot:description_slot>
            Testing that components with the <code>hidden</code> attribute do not render labels, help text, or error messages.
        </x-slot:description_slot>
        <x-slot:code_slot>
            @verbatim
<x-form-input name="hidden_input" label="Should not be visible" hidden help-text="Should not be visible" />
<x-form-textarea name="hidden_textarea" label="Should not be visible" hidden help-text="Should not be visible" />
<x-form-select name="hidden_select" label="Should not be visible" hidden help-text="Should not be visible">
    <option>1</option>
</x-form-select>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input name="hidden_input" label="Should not be visible" hidden help-text="Should not be visible" />
        <x-form-textarea name="hidden_textarea" label="Should not be visible" hidden help-text="Should not be visible" />
        <x-form-select name="hidden_select" label="Should not be visible" hidden help-text="Should not be visible">
            <option>1</option>
        </x-form-select>
        <p class="text-muted">No components should be visible above this line (only the code block).</p>
    </x-form::preview.components.example>
</x-form::preview.components.section>
