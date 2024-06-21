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

<x-form-form id="form-3">
    <x-form-checkbox id="checkbox" name="checkbox" value="a" label="checkbox" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
</x-form-form>

<x-form-form id="form-default">
    <x-form-checkbox :default="true" name="checkbox" />
</x-form-form>
