<x-form-form id="input-validation-error" method="POST">
    <div>
        <x-form-input name="tel" type="tel"/>
    </div>
    <div>
        <x-form-input name="text" type="text" required/>
    </div>
    <div>
        <x-form-input name="checkbox" type="checkbox" required/>
    </div>
    <div>
        <x-form-input name="radio" type="radio" required/>
    </div>
    <x-form-submit />
</x-form-form>
