@php
$target = ['checkbox' => ['a']];
@endphp

<x-form-form>
    @bind($target)
        <x-form-checkbox name="checkbox[]" value="a" label="a" />
        <x-form-checkbox name="checkbox[]" value="b" label="b" />
    @endbind

    <x-form-submit />
</x-form-form>
