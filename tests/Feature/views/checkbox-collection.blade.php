@php
$target = ['permissions' => collect(['read'])]
@endphp

<x-form-form>
    @bind($target)
    <x-form-checkbox name="permissions[]" value="read" />
    <x-form-checkbox name="permissions[]" value="write" />
    @endbind

    <x-form-submit />
</x-form-form>
