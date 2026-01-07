<x-form-form id="select-help-slot">
    <x-form-select id="select" name="select">
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
        @slot('help')
            slot help text
        @endslot
    </x-form-select>
    <x-form-submit />
</x-form-form>
