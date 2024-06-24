@php
    $target = [
        'input' => 'a',
        'textarea' => 'b',
        'html-editor' => 'c',
        'select' => 'd',
        'checkbox' => true,
        'radio' => false
    ];
@endphp

<x-form-form>
    @bind($target)
        <x-form-input name="input" />
        <x-form-textarea name="textarea" />
        <x-form-html-editor name="html-editor" />
        <x-form-select name="select" :options="['c' => 'c', 'd' => 'd', 'f' => 'f']" />
        <x-form-checkbox name="checkbox" />
        <x-form-radio name="radio" />
        <x-form-submit />
    @endbind
</x-form-form>
