<x-form-form id="form-help-text">
    <x-form-input name="input">
        @slot('help')
            <x-form-text>
                Your username must be 8-20 characters long.
            </x-form-text>
        @endslot
    </x-form-input>
</x-form-form>

<x-form-form id="form-aria-describedby" uses-custom-validation>
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
    <x-form-html-editor id="html-editor" class="html-editor-required" name="html-editor" required>
        @slot('help')
            Help text
        @endslot
    </x-form-html-editor>
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
    <x-form-input-group id="input-group">
        @slot('help')
            Help text
        @endslot
        <x-form-input-group-text id="inputGroupPrepend">@</x-form-input-group-text>
        <x-form-input id="validationCustomUsername" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
    </x-form-input-group>
    <x-form-group id="form-group" class-help-text="text-danger" help-text="input group help text">
        <x-form-input name="something" id="inputGroupPrepend"></x-form-input>
        <x-form-input id="validationCustomUsername" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
    </x-form-group>
</x-form-form>

<x-form-form id="form-help-text-extra-classes" uses-custom-validation>
    <x-form-input id="input" class="input-required" name="input" label="input" required class-help-text="text-danger">
        @slot('help')
            Help text
        @endslot
    </x-form-input>
    <x-form-select id="select" class="select-required" name="select" required class-help-text="text-something">
        @slot('help')
            Help text
        @endslot
    </x-form-select>
    <x-form-textarea id="textarea" class="textarea-required" name="textarea" required class-help-text="text-primary">
        @slot('help')
            Help text
        @endslot
    </x-form-textarea>
    <x-form-html-editor id="html-editor" class="html-editor-required" name="html-editor" required class-help-text="text-secondary">
        @slot('help')
            Help text
        @endslot
    </x-form-html-editor>
    <x-form-checkbox id="checkbox" class="checkbox-required" name="checkbox" required class-help-text="text-info">
        @slot('help')
            Help text
        @endslot
    </x-form-checkbox>
    <x-form-radio id="radio" class="radio-required" name="radio" required class-help-text="text-warning">
        @slot('help')
            Help text
        @endslot
    </x-form-radio>
    <x-form-input-group id="input-group" class-help-text="text-danger" help-text="input group help text">
        <x-form-input-group-text id="inputGroupPrepend">@</x-form-input-group-text>
        <x-form-input id="validationCustomUsername" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
    </x-form-input-group>
    <x-form-group id="form-group" class-help-text="text-danger" help-text="input group help text">
        <x-form-input name="something" id="inputGroupPrepend"></x-form-input>
        <x-form-input id="validationCustomUsername" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
    </x-form-group>
</x-form-form>

