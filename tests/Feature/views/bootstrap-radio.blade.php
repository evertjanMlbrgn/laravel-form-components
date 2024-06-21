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

<x-form-form id="form-3">
    <x-form-radio id="radio" name="radio" value="a" label="radio" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
</x-form-form>

<x-form-form id="form-default">
    <x-form-radio :default="true" name="radio" />
</x-form-form>

<x-form-form id="form-radio-validation">
    <x-form-radio name="radio" value="a" />
    <x-form-radio name="radio" value="b" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-radio-zero-value">
    <x-form-input name="input" />

    <x-form-radio name="radio" value="0" />
    <x-form-radio name="radio" value="1" />

    <x-form-submit />
</x-form-form>

