<x-form-form>
    <x-form-input floating name="input-1" id="input-1" label="Input 1" />
    <x-form-input floating name="input-2" id="input-2" label="Input 2" placeholder="John Doe" />
    {{-- Selects can't have placeholder--}}
    <x-form-select floating name="select-1" id="select-1" label="Select 1"/>
    <x-form-select floating name="select-2" id="select-2" label="Select 2" placeholder="Jane Doe" />
    <x-form-textarea floating name="textarea-1" id="textarea-1" label="Textarea 1"/>
    <x-form-textarea floating name="textarea-2" id="textarea-2" label="Textarea 2" placeholder="Jane John" />
    {{-- Elements below don't support floating labels--}}
    <x-form-checkbox floating name="checkbox" id="checkbox-1" label="Checkbox"/>
    <x-form-radio floating name="radio" id="radio-1" label="Radio"/>
</x-form-form>
