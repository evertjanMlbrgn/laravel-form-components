@php
$target = ['html-editor-1' => ['html-editor-bound-value']];
@endphp

<x-form-form id="form-1">
    <x-form-html-editor name="html-editor-1" label="label 1"></x-form-html-editor>
</x-form-form>

<x-form-form id="form-2">
    <x-form-html-editor name="html-editor-1" label="label 1">
        html-content-1
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-3">
    <x-form-html-editor name="html-editor-1" label="label 1" class="extra-class extra-class-2">
        html-content-1
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-4">
    <x-form-html-editor name="html-editor-1" label="label 1" required disabled something readonly>
        html-content-1
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-5">
    <x-form-html-editor id="hidden-html-editor" name="html-editor-1" label="label 1" hidden>
        html-content-1
    </x-form-html-editor>
    <x-form-html-editor id="non-hidden-html-editor" name="html-editor-2" label="label 2">
        html-content-2
    </x-form-html-editor>
</x-form-form>

<x-form-form id="form-6">
    @bind($target)
    <x-form-html-editor id="bound-html-editor" name="html-editor-1" label="label 1"></x-form-html-editor>
    @endbind
</x-form-form>

<x-form-form id="form-7">
    <x-form-html-editor id="id-using-id" name="html-editor-1" label="label 1" required></x-form-html-editor>
    <x-form-html-editor name="id-using-name" label="label 2"></x-form-html-editor>
    <x-form-html-editor class="html-editor-3" label="label 3"></x-form-html-editor>
</x-form-form>

<x-form-form id="form-8">
    <x-form-html-editor id="content-using-slot">
        Sample content
    </x-form-html-editor>
</x-form-form>
