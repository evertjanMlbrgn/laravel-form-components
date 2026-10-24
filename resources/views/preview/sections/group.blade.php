<x-form::preview.components.section id="form-group" title="Form Group" description="The <code>x-form-group</code> component is useful for grouping multiple related controls under a single label, with shared validation and help text.">
    <x-form::preview.components.example title="Basic Grouping">
        <x-slot:code_slot>
            @verbatim
<x-form-group label="Receive newsletters?">
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
        <x-form-group label="Receive newsletters?" class="mb-3">
            <x-form-radio name="newsletter" value="1" label="Yes" inline />
            <x-form-radio name="newsletter" value="0" label="No" inline />
        </x-form-group>

        <x-form-group label="Interests" help-text="Select all that apply">
            <x-form-checkbox name="interests[]" value="tech" label="Technology" inline />
            <x-form-checkbox name="interests[]" value="sports" label="Sports" inline />
            <x-form-text>Custom text inside group</x-form-text>
        </x-form-group>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Inline and Validation">
        <x-slot:code_slot>
            @verbatim
<x-form-form validation-mode="client-custom">
    <!-- Inline group with shared validation -->
    <x-form-group name="radio-inline-1" label="Receive newsletters?" inline required invalid-feedback="Select one of the two buttons" valid-feedback="That's clear!">
        <x-form-radio name="radio-inline-1" value="1" label="Yes" :show-errors="false" />
        <x-form-radio name="radio-inline-1" value="2" label="No" />
    </x-form-group>

    <!-- Inline group with individual validation -->
    <x-form-group name="checkbox-inline-2" label="Want more updates?" :show-errors="false" inline>
        <x-form-checkbox name="checkbox-inline-2" value="1" label="Yes" required invalid-feedback="nope" valid-feedback="yeah" />
        <x-form-checkbox name="checkbox-inline-2" value="2" label="Yes, please!" required invalid-feedback="nope" valid-feedback="yeah"/>
    </x-form-group>

    <x-form-submit>Validate Group</x-form-submit>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form validation-mode="client-custom">
            <x-form-group name="radio-inline-1" label="Receive newsletters?" inline required invalid-feedback="Select one of the two buttons" valid-feedback="That's clear!" class="mb-3">
                <x-form-radio name="radio-inline-1" class="me-3" value="1" label="Yes" :show-errors="false" />
                <x-form-radio name="radio-inline-1" value="2" label="No" />
            </x-form-group>
            <x-form-group name="checkbox-inline-2" label="Want more updates?" :show-errors="false" inline class="mb-3">
                <x-form-checkbox name="checkbox-inline-2" class="me-3" value="1" label="Yes" required invalid-feedback="nope" valid-feedback="yeah" />
                <x-form-checkbox name="checkbox-inline-2" value="2" label="Yes, please!" required invalid-feedback="nope" valid-feedback="yeah"/>
            </x-form-group>
            <x-form-submit>Validate Group</x-form-submit>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multiple Textareas/Inputs">
        <x-slot:code_slot>
            @verbatim
<x-form-group label="Explain why you made this choice">
    <x-form-textarea label="In this textarea" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
    <x-form-textarea label="And in this one" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
</x-form-group>
            @endverbatim
        </x-slot:code_slot>
        <x-form-group label="Explain why you made this choice" class="mb-3">
            <x-form-textarea label="In this textarea" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
            <x-form-textarea label="And in this one" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
        </x-form-group>
        <x-form-group label="Where did you hear of us?" required invalid-feedback="Select a value" valid-feedback="Way to go!" help-text="test help text">
            <x-form-select label="Select one" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false" placeholder="Make a selection">
                <option value="Newspaper">Newspaper</option>
                <option value="TV">Tv</option>
                <option value="Radio">Radio</option>
            </x-form-select>
            <x-form-select label="Select two" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false" placeholder="Make a selection">
                <option value="Google">Google</option>
                <option value="Other">Other</option>
            </x-form-select>
        </x-form-group>
    </x-form::preview.components.example>
</x-form::preview.components.section>
