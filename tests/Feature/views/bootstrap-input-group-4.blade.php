<x-form-form id="input-group-4-form">
    <x-form-input-group id="input-group-4" hidden>
        <x-form-input name="name" id="name" />
        <x-form-input-group-text>@</x-form-input-group-text>
        <x-form-input name="username" id="username"></x-form-input>
        @slot('help')
            slot help text
        @endslot
    </x-form-input-group>
</x-form-form>
