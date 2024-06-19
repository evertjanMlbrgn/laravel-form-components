<x-form-form uses-custom-validation>
    <x-form-input id="input" class="input-required" name="input" label="input" required>
        @slot('help')
            Help text
        @endslot
    </x-form-input>
    <x-form-select id="select" class="select-required" name="select" required>
        @slot('help')
            Help text
        @endslot
    </x-form-select>
    <x-form-textarea id="textarea" class="textarea-required" name="textarea" required>
        @slot('help')
            Help text
        @endslot
    </x-form-textarea>
    <x-form-checkbox id="checkbox" class="checkbox-required" name="checkbox" required>
        @slot('help')
            Help text
        @endslot
    </x-form-checkbox>
    <x-form-radio id="radio" class="radio-required" name="radio" required>
        @slot('help')
            Help text
        @endslot
    </x-form-radio>
    <x-form-input-group>
        <x-form-input-group-text id="inputGroupPrepend">@</x-form-input-group-text>
        <x-form-input id="validationCustomUsername" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
    </x-form-input-group>
</x-form-form>
