@php
$target = ['checkbox' => ['a']];
@endphp

<x-form-form id="form-1">
    @bind($target)
        <x-form-checkbox name="checkbox[]" value="a" label="a" />
        <x-form-checkbox name="checkbox[]" value="b" label="b" />
    @endbind
</x-form-form>

<x-form-form id="form-2">
    @bind($target)
    <x-form-checkbox id="hidden-checkbox" name="checkbox[]" value="a" label="a" hidden />
    <x-form-checkbox id="non-hidden-checkbox" name="checkbox[]" value="b" label="b" />
    @endbind
</x-form-form>
