<x-form::preview.components.section id="form-group" title="Form Group" description="The <code>x-form-group</code> component is useful for grouping multiple related controls under a single label, with shared validation and help text.">
    <x-form::preview.components.example title="Basic Grouping">
        <x-slot:code_slot>
            @verbatim
<x-form-group label="Receive newsletters?" class="mb-3">
    <x-form-radio name="newsletter" value="1" label="Yes" inline />
    <x-form-radio name="newsletter" value="0" label="No" inline />
</x-form-group>

<x-form-group label="Interests" help-text="Select all that apply">
    <x-form-checkbox name="interests[]" value="tech" label="Technology" inline />
    <x-form-checkbox name="interests[]" value="sports" label="Sports" inline />
    <x-form-text>Custom text inside group</x-form-text>
</x-form-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-group label="Receive newsletters?" class="mb-3 p-3 border rounded">
            <x-form-radio name="newsletter" value="1" label="Yes" inline class="me-3" />
            <x-form-radio name="newsletter" value="0" label="No" inline />
        </x-form-group>

        <x-form-group label="Interests" help-text="Select all that apply" class="p-3 border rounded">
            <x-form-checkbox name="interests[]" value="tech" label="Technology" inline class="me-3" />
            <x-form-checkbox name="interests[]" value="sports" label="Sports" inline class="me-3" />
            <x-form-text>Custom text inside group</x-form-text>
        </x-form-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Inline and Validation">
        <x-slot:code_slot>
            @verbatim
<x-form-group label="Inline group" inline required invalid-feedback="Please select one.">
    <x-form-radio name="inline_group" value="1" label="Option 1" />
    <x-form-radio name="inline_group" value="2" label="Option 2" />
</x-form-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form validation-mode="client-custom">
            <x-form-group label="Inline group" inline required invalid-feedback="Please select one." class="p-3 border rounded mb-3">
                <x-form-radio name="inline_group" value="1" label="Option 1" class="me-3" :show-errors="false" />
                <x-form-radio name="inline_group" value="2" label="Option 2" :show-errors="false" />
            </x-form-group>
            <x-form-submit>Validate Group</x-form-submit>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multiple Textareas/Inputs">
        <x-slot:code_slot>
            @verbatim
<x-form-group label="Explain why you made this choice" class-inline-wrapper="gap-3">
    <x-form-textarea label="Reason 1" class="mb-3"></x-form-textarea>
    <x-form-textarea label="Reason 2"></x-form-textarea>
</x-form-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-group label="Explain why you made this choice" class="p-3 border rounded" class-inline-wrapper="gap-3">
            <x-form-textarea label="Reason 1" class="mb-3"></x-form-textarea>
            <x-form-textarea label="Reason 2"></x-form-textarea>
        </x-form-group>
    </x-form::preview.components.example>
</x-form::preview.components.section>
