@php
$target = ['checkbox' => ['a']];
@endphp

<x-form-form id="form-checkbox-no-id">
    @bind($target)
        <x-form-checkbox name="checkbox[]" value="a" label="a" />
        <x-form-checkbox name="checkbox[]" value="b" label="b" />
    @endbind
</x-form-form>

<x-form-form id="form-checkbox-hidden">
    <x-form-checkbox id="hidden-checkbox" name="checkbox[]" value="a" label="a" hidden help-text="help text"/>
    <x-form-checkbox id="non-hidden-checkbox" name="checkbox[]" value="b" label="b" help-text="help text"/>
</x-form-form>

<x-form-form id="form-checkbox-classes">
    <x-form-checkbox id="checkbox" name="checkbox"/>
</x-form-form>

<x-form-form id="form-checkbox-extra-classes">
    <x-form-checkbox id="checkbox" name="checkbox" class="extra-1 extra-2 form-control-lg"/>
</x-form-form>

<x-form-form id="form-checkbox-extra-attributes">
    <x-form-checkbox id="checkbox" name="checkbox" readonly disabled/>
</x-form-form>

<x-form-form id="form-checkbox-wrapper-classes">
    <x-form-checkbox id="checkbox" name="checkbox" value="a" label="checkbox" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal/>
</x-form-form>

<x-form-form id="form-checkbox-validation">
    <x-form-checkbox name="checkbox-validation" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-checkbox-validation-error">
    <x-form-checkbox name="checkbox" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-checkbox-no-help">
    <x-form-checkbox id="checkbox" name="checkbox" value="a" label="checkbox"/>
</x-form-form>

<x-form-form id="form-checkbox-help-text">
    <x-form-textarea id="checkbox" name="checkbox" help-text="attribute help text"/>
</x-form-form>

<x-form-form id="form-checkbox-help-slot">
    <x-form-checkbox id="checkbox" name="checkbox">
        @slot('help')
            slot help text
        @endslot
    </x-form-checkbox>
</x-form-form>

<x-form-form id="form-checkbox-default">
    <x-form-checkbox :default="true" name="checkbox" />
</x-form-form>
