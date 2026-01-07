@php
    $target = ['checkbox' => ['a']];
@endphp

<x-form-form id="checkbox-no-id">
    @bind($target)
    <x-form-checkbox name="checkbox[]" value="a" label="a" />
    <x-form-checkbox name="checkbox[]" value="b" label="b" />
    @endbind
</x-form-form>
