{{--TODO why 2 versions of this form?--}}
<x-form-form>
    <x-form-input name="input">
        @slot('help')
            <x-form-text>
                Your username must be 8-20 characters long.
            </x-form-text>
        @endslot
    </x-form-input>
</x-form-form>

<x-form-form id="form-aria-describedby" validation-mode="client-custom">
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

<x-form-form id="form-help-text-extra-classes" validation-mode="client-custom">
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

{{--<x-form-form id="form-help-slot">--}}
{{--    <x-form-input id="button" name="button" type="button">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="checkbox" name="checkbox" type="checkbox">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="color" name="color" type="color">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="date" name="date" type="date">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="datetime-local" name="datetime-local" type="datetime-local">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="email" name="email" type="email">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="file" name="file" type="file">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="hidden" name="hidden" type="hidden">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="image" name="image" type="image">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="month" name="month" type="month">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="number" name="number" type="number">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="password" name="password" type="password">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="radio" name="radio" type="radio">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="range" name="range" type="range">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="reset" name="reset" type="reset">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="search" name="search" type="search">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="submit" name="submit" type="submit">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="tel" name="tel" type="tel">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="text" name="text" type="text">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="time" name="time" type="time">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="url" name="url" type="url">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--    <x-form-input id="week" name="week" type="week">--}}
{{--        @slot('help')--}}
{{--            help text by slot--}}
{{--        @endslot--}}
{{--    </x-form-input>--}}
{{--</x-form-form>--}}
