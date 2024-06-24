@php
    $binding = ['textarea-bind' => 'Textarea bound value'];
@endphp

<x-form-form id="form-textarea-default">
    <x-form-textarea default="b" name="textarea" />
</x-form-form>

<x-form-form id="form-textarea-no-id">
    <x-form-textarea name="textarea" />
</x-form-form>

<x-form-form id="form-textarea-hidden">
    <x-form-textarea id="hidden-textarea" name="textarea" label="test" hidden help-text="textarea help text"/>
    <x-form-textarea id="non-hidden-textarea" name="textarea" label="test" help-text="textarea help text"/>
</x-form-form>

<x-form-form id="form-textarea-extra-classes">
    <x-form-textarea id="textarea" name="textarea" class="extra-1 extra-2 form-control-lg"/>
</x-form-form>

<x-form-form id="form-textarea-extra-attributes">
    <x-form-textarea id="textarea" name="textarea" readonly disabled/>
</x-form-form>

<x-form-form id="form-textarea-wrapper-classes">
    <x-form-textarea id="textarea" name="textarea" label="textarea" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal>
        <p>some content</p>
    </x-form-textarea>
</x-form-form>

<x-form-form id="form-textarea-bind">
    @bind($binding)
        <x-form-textarea id="bound-textarea" name="textarea-bind" label="label 1"></x-form-textarea>
    @endbind
</x-form-form>

<x-form-form id="form-textarea-validation">
    <x-form-textarea name="textarea-validation" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-textarea-validation-error">
    <x-form-textarea name="textarea" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-textarea-value-using-slot">
    <x-form-html-editor id="value-using-slot">
        Value using slot
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-textarea-help-text">
    <x-form-textarea id="textarea" name="textarea" help-text="attribute help text"/>
</x-form-form>

<x-form-form id="form-textarea-help-slot">
    <x-form-textarea id="textarea" name="textarea">
        @slot('help')
            slot help text
        @endslot
    </x-form-textarea>
</x-form-form>

<x-form-form id="form-textarea-no-help">
    <x-form-textarea id="textarea" name="textarea"/>
</x-form-form>

