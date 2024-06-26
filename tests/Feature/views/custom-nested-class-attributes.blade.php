{{--<x-form-form>--}}
{{--    <x-form-input id="input" readonly class="form-control-plaintext mb-3" label="Email" value="email@example.com"--}}
{{--                  horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="username"/>--}}
{{--    <x-form-input id="password" type="password" class="mb-3" label="Password" horizontal class-horizontal-cols-label="col-3"--}}
{{--                  class-horizontal-cols-control="col-9" autocomplete="new-password"/>--}}
{{--    <x-form-button id="button" class="btn-secondary">Button</x-form-button>--}}
{{--    --}}{{-- toggle check and radio --}}
{{--    <x-form-checkbox id="checkbox-toggle" checked autocomplete="off" label="Checked checkbox" class-toggle-button="btn-outline-secondary" toggle/>--}}
{{--    <x-form-radio id="radio-toggle" autocomplete="off" checked label="Checked radio" class-toggle-button="btn-outline-success" toggle/>--}}
{{--</x-form-form>--}}

<x-form-form id="form-set-cols-using-attributes">
    <x-form-input
        id="email"
        name="email-name"
        class="form-control-plaintext mb-3"
        label="Horizontal email input"
        value="email@example.com"
        type="email"
        autocomplete="username"
        class-horizontal-cols-label="col-2"
        class-horizontal-cols-control="col-10"
        class-label="test-class"
        horizontal readonly/>
    <x-form-input
        id="password"
        name="password-name"
        type="password"
        class="mb-3"
        label="Horizontal password input"
        autocomplete="new-password"
        class-horizontal-cols-label="col-3"
        class-horizontal-cols-control="col-9"
        class-label="test-class"
        horizontal/>
{{--    <x-form-button id="button" class="btn-secondary">Button</x-form-button>--}}
{{--    <x-form-checkbox id="checkbox-toggle" checked autocomplete="off" label="Checked checkbox" class-toggle-button="btn-outline-secondary" toggle/>--}}
{{--    <x-form-radio id="radio-toggle" autocomplete="off" checked label="Checked radio" class-toggle-button="btn-outline-success" toggle/>--}}
    <x-form-select
        id="select"
        name="select-name"
        autocomplete="off"
        label="horizontal select"
        class-horizontal-cols-label="col-4"
        class-horizontal-cols-control="col-8"
        class-label="test-class"
        horizontal/>
    <x-form-textarea
        id="textarea"
        name="textarea-name"
        autocomplete="off"
        label="horizontal textarea"
        class-horizontal-cols-label="col-5"
        class-horizontal-cols-control="col-7"
        class-label="test-class"
        horizontal/>
    <x-form-html-editor
        id="html-editor"
        name="html-editor-name"
        autocomplete="off"
        label="horizontal HTML editor"
        class-horizontal-cols-label="col-6"
        class-horizontal-cols-control="col-6"
        class-label="test-class"
        horizontal/>
</x-form-form>

<x-form-form id="form-class-label-attribute">
    <x-form-input
        id="email"
        name="email-name"
        class="form-control-plaintext mb-3"
        label="Input"
        value="email@example.com"
        type="email"
        autocomplete="username"
        class-label="test-class"
       />
    <x-form-input
        id="password"
        name="password-name"
        type="password"
        class="mb-3"
        label="Password"
        autocomplete="new-password"
        class-label="test-class"
        />
    {{--    <x-form-button id="button" class="btn-secondary">Button</x-form-button>--}}
    {{--    <x-form-checkbox id="checkbox-toggle" checked autocomplete="off" label="Checked checkbox" class-toggle-button="btn-outline-secondary" toggle/>--}}
    {{--    <x-form-radio id="radio-toggle" autocomplete="off" checked label="Checked radio" class-toggle-button="btn-outline-success" toggle/>--}}
    <x-form-select
        id="select"
        name="select-name"
        autocomplete="off"
        label="Select"
        class-label="test-class"/>
    <x-form-textarea
        id="textarea"
        name="textarea-name"
        autocomplete="off"
        label="Textarea"
        class-label="test-class"/>
    <x-form-html-editor
        id="html-editor"
        name="html-editor-name"
        autocomplete="off"
        label="HTML editor"
        class-label="test-class"/>
    <x-form-input
        id="checkbox-using-input"
        name="checkbox-using-input"
        label="Checkbox"
        type="checkbox"
        class-label="test-class"/>
    <x-form-checkbox
        id="checkbox-using-component"
        name="checkbox-using-component"
        label="Checkbox"
        class-label="test-class"/>
    <x-form-input
        id="radio-using-input"
        name="email-name"
        label="Radio"
        type="radio"
        class-label="test-class"/>
    <x-form-radio
        id="radio-using-component"
        name="password-name"
        label="Radio"
        class-label="test-class"/>
</x-form-form>

<x-form-form id="form-class-toggle-button">
    <x-form-input
        id="checkbox-using-input"
        name="checkbox-using-input"
        label="Checkbox"
        type="checkbox"
        class-label="test-class"
        toggle
        class-toggle-button="btn-first"/>
    <x-form-checkbox
        id="checkbox-using-component"
        name="checkbox-using-component"
        label="Checkbox"
        class-label="test-class"
        toggle
        class-toggle-button="btn-second"/>
    <x-form-input
        id="radio-using-input"
        name="email-name"
        label="Radio"
        type="radio"
        class-label="test-class"
        toggle
        class-toggle-button="btn-third"/>
    <x-form-radio
        id="radio-using-component"
        name="password-name"
        label="Radio"
        class-label="test-class"
        toggle
        class-toggle-button="btn-fourth"/>
</x-form-form>

<x-form-form id="form-group-inline-classes">
    <x-form-group inline class-inline-wrapper="gap-3">
        <input name="email" label="Email"/>
        <input name="password" type="password" label="Password"/>
    </x-form-group>
</x-form-form>
