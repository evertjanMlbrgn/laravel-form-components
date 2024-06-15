<x-form-form>
    <x-form-input name="input">
        @slot('help')
            <x-form-text>
                Your username must be 8-20 characters long.
            </x-form-text>
        @endslot
    </x-form-input>
</x-form-form>
