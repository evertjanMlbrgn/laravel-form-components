@php
    $binding = ['textarea-bind' => 'Textarea bound value'];
@endphp

<x-form-form id="form-textarea-bind">
    @bind($binding)
        <x-form-textarea id="bound-textarea" name="textarea-bind" label="label 1"></x-form-textarea>
    @endbind
</x-form-form>



