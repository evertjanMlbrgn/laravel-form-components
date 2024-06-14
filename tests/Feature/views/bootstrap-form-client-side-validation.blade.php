<x-form-form has-custom-client-side-validation>
    <div class="input-required">
        <x-form-input class="input-required" name="input" label="input" required/>
    </div>
    <x-form-select class="select-required" name="select" required/>
    <x-form-textarea class="textarea-required" name="textarea" required/>
    <x-form-checkbox class="checbox-required" name="checkbox" required/>
    <x-form-radio class="radio_required" name="radio" required/>

    <div class="input-not-required">
        <x-form-input class="input" name="input" label="input"/>
    </div>
    <x-form-select class="select" name="select"/>
    <x-form-textarea class="textarea" name="textarea"/>
    <x-form-checkbox class="checbox" name="checkbox"/>
    <x-form-radio class="radio" name="radio"/>
    <x-form-input-group>
        <x-form-input-group-text id="inputGroupPrepend">@</x-form-input-group-text>
        <x-form-input id="validationCustomUsername" aria-describedby="inputGroupPrepend" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
    </x-form-input-group>
    <x-form-input-group class="input-group-2">
        <x-form-input-group-text id="inputGroupPrepend">@</x-form-input-group-text>
        <x-form-input id="validationCustomUsername" aria-describedby="inputGroupPrepend" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
    </x-form-input-group>
</x-form-form>
