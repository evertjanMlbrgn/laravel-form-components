<x-form-form id="select-hidden">
    <x-form-select id="hidden-select" name="select" value="select-value" label="hidden-select-label" hidden help-text="test">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>
    <x-form-select id="non-hidden-select" name="select" value="select-value" label="noon-hidden-select-label">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        @slot('help')
            other help text
        @endslot
    </x-form-select>
    <x-form-submit />
</x-form-form>
