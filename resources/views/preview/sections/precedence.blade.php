<x-form::preview.components.section id="form-precedence" title="Binding & Precedence">
    @php
        $bindData = [
            'input_bound' => 'Value from @bind directive',
            'input_precedence' => 'Bound value (should be overridden)',
        ];
        $oldInput = [
            'input_old' => 'Value from old input',
            'input_precedence' => 'Old value (highest precedence)',
        ];
        session()->flash('_old_input', $oldInput);
    @endphp

    <x-form::preview.components.example title="Value Precedence">
        <x-slot:code_slot>
            @verbatim
@bind($bindData)
    <x-form-input name="input_default" label="Default Value Only" default="I am the default" />
    <x-form-input name="input_bound" label="Bound Value" default="I am the default" />
    <x-form-input name="input_value" label="Explicit Value Attribute" value="I am explicit" default="I am the default" />
    <x-form-input name="input_old" label="Old Input (Session)" default="I am the default" />
    <x-form-input name="input_precedence" label="Precedence Test (Old > Explicit > Bound > Default)"
        value="Explicit Value"
        default="Default Value" />
@endbind
            @endverbatim
        </x-slot:code_slot>

        @bind($bindData)
            <x-form-input name="input_default" label="Default Value Only" default="I am the default" />
            <x-form-input name="input_bound" label="Bound Value" default="I am the default" />
            <x-form-input name="input_value" label="Explicit Value Attribute" value="I am explicit" default="I am the default" />
            <x-form-input name="input_old" label="Old Input (Session)" default="I am the default" />
            <x-form-input name="input_precedence" label="Precedence Test (Old > Explicit > Bound > Default)"
                value="Explicit Value"
                default="Default Value" />
        @endbind
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Binding with Attribute">
        <x-slot:code_slot>
            @verbatim
<x-form-input name="input_attr_bind" label="Bound via Attribute" :bind="['input_attr_bind' => 'Value from attribute bind']" />
            @endverbatim
        </x-slot:code_slot>
        <x-form-input name="input_attr_bind" label="Bound via Attribute" :bind="['input_attr_bind' => 'Value from attribute bind']" />
    </x-form::preview.components.example>
</x-form::preview.components.section>
