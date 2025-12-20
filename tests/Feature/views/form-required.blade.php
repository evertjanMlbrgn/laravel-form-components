<x-form-form id="form-required">
    <div class="input-required">
        <x-form-input class="input-required" name="input" label="input" required/>
    </div>
    <x-form-select class="select-required" name="select" required/>
    <x-form-textarea class="textarea-required" name="textarea" required/>
    <x-form-checkbox class="checkbox-required" name="checkbox" required/>
    <x-form-radio class="radio_required" name="radio" required/>

    <div class="input-not-required">
        <x-form-input class="input" name="input" label="input"/>
    </div>
    <x-form-select class="select" name="select"/>
    <x-form-textarea class="textarea" name="textarea"/>
    <x-form-checkbox class="checkbox" name="checkbox"/>
    <x-form-radio class="radio" name="radio"/>
</x-form-form>
