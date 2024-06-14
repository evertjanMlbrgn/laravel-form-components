@php
$target = ['radio' => 'a'];
@endphp

<x-form-form>
    @bind($target)
    <x-form-radio name="radio" value="a" />

    <x-form-radio name="radio" value="b" />
    @endbind

    <x-form-submit />
</x-form-form>
