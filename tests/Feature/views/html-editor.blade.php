@php
$target = ['checkbox' => ['a']];
@endphp

<x-form-form>
    @bind($target)
        <x-form-html-editor name="html-editor-1" label="label 1" required>
            html-content-1
        </x-form-html-editor>
        <x-form-html-editor name="html-editor-2" id="html-editor-2" label="label 2">
            html-content-2
        </x-form-html-editor>
    @endbind
</x-form-form>
