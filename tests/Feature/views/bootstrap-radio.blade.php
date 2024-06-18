@php
    $target = ['radio' => '1'];
@endphp

<x-form-form id="form-1">
    @bind($target)
    <x-form-radio name="radio" value="0" label="Zero" />
    <x-form-radio name="radio" value="1" default label="One"/>
    @endbind
</x-form-form>

<x-form-form id="form-2">
    @bind($target)
    <x-form-radio id="hidden-radio" name="radio" value="a" label="hidden radio" hidden />
    <x-form-radio id="non-hidden-radio" name="radio" value="b" label="non hidden radio" />
    @endbind
</x-form-form>
