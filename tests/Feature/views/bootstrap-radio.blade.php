@php
    $target = ['radio' => '1'];
@endphp

<x-form-form id="form-radio-no-id">
    @bind($target)
    <x-form-radio name="radio" value="0" label="Zero" />
    <x-form-radio name="radio" value="1" default label="One"/>
    @endbind
</x-form-form>

<x-form-form id="form-radio-hidden">
    <x-form-radio id="hidden-radio" name="radio" value="a" label="hidden radio" hidden help-text="help text"/>
    <x-form-radio id="non-hidden-radio" name="radio" value="b" label="non hidden radio" help-text="help text"/>
</x-form-form>

<x-form-form id="form-radio-classes">
    <x-form-checkbox id="radio" name="radio"/>
</x-form-form>

<x-form-form id="form-radio-extra-classes">
    <x-form-checkbox id="radio" name="radio" class="extra-1 extra-2 form-control-lg"/>
</x-form-form>

<x-form-form id="form-radio-extra-attributes">
    <x-form-checkbox id="radio" name="radio" readonly disabled/>
</x-form-form>

<x-form-form id="form-radio-wrapper-classes">
    <x-form-radio id="radio" name="radio" value="a" label="radio" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
</x-form-form>

<x-form-form id="form-radio-validation">
    <x-form-radio name="radio-validation" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-radio-validation-error">
    <x-form-radio name="radio" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-radio-no-help">
    <x-form-radio id="radio" name="radio" value="a" label="radio"/>
</x-form-form>

<x-form-form id="form-radio-help-text">
    <x-form-radio id="radio" name="radio" help-text="attribute help text"/>
</x-form-form>

<x-form-form id="form-radio-help-slot">
    <x-form-radio id="radio" name="radio">
        @slot('help')
            slot help text
        @endslot
    </x-form-radio>
</x-form-form>

<x-form-form id="form-radio-default">
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

