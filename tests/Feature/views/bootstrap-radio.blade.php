@php
    $target = ['radio' => '1'];
@endphp

<x-form-form>
    @bind($target)
    <x-form-radio name="radio" value="0" label="Zero" />
    <x-form-radio name="radio" value="1" default label="One"/>
    @endbind
</x-form-form>
