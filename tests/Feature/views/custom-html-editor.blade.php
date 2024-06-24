@php
    $binding = ['html-editor-bind' => 'HTML editor bound value'];
@endphp

<x-form-form id="form-html-editor-no-id">
    <x-form-html-editor></x-form-html-editor>
</x-form-form>

<x-form-form id="form-html-editor-classes">
    <x-form-html-editor name="html-editor" label="label 1"></x-form-html-editor>
</x-form-form>

<x-form-form id="form-2">
    <x-form-html-editor name="html-editor" label="label 1">
        html-content-1
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-html-editor-extra-classes">
    <x-form-html-editor name="html-editor" label="label 1" class="extra-class extra-class-2">
        html-content-1
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-html-editor-extra-attributes">
    <x-form-html-editor name="html-editor" label="label 1" required disabled something readonly>
        html-content-1
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-html-editor-hidden">
    <x-form-html-editor id="hidden-html-editor" name="html-editor-1" label="label 1" hidden help-text="other help text">
        html-content-1
    </x-form-html-editor>
    <x-form-html-editor id="non-hidden-html-editor" name="html-editor-2" label="label 2" help-text="other help text">
        html-content-2
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-html-editor-wrapper-classes">
    <x-form-html-editor id="html-editor" name="html-editor" label="html-editor" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
</x-form-form>

<x-form-form id="form-html-editor-bind">
    @bind($binding)
        <x-form-html-editor id="bound-html-editor" name="html-editor-bind" label="label 1"></x-form-html-editor>
    @endbind
</x-form-form>

{{--<x-form-form id="form-ids">--}}
{{--    <x-form-html-editor id="id-using-id" name="html-editor-1" label="label 1" required></x-form-html-editor>--}}
{{--    <x-form-html-editor name="id-using-name" label="label 2"></x-form-html-editor>--}}
{{--    <x-form-html-editor class="html-editor-3" label="label 3"></x-form-html-editor>--}}
{{--</x-form-form>--}}

<x-form-form id="form-html-editor-validation">
    <x-form-html-editor name="html-editor-validation" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-html-editor-validation-error">
    <x-form-html-editor name="html-editor" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-html-editor-no-help">
    <x-form-html-editor>
        Sample content
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-html-editor-value-using-slot">
    <x-form-html-editor id="value-using-slot">
        Value using slot
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-html-editor-default">
    <x-form-textarea default="b" name="textarea" />
</x-form-form>

<x-form-form id="form-html-editor-help-text">
    <x-form-textarea id="html-editor" name="html-editor" help-text="attribute help text"/>
</x-form-form>

<x-form-form id="form-html-editor-help-slot">
    <x-form-textarea id="html-editor" name="html-editor">
        @slot('help')
            slot help text
        @endslot
    </x-form-textarea>
</x-form-form>
