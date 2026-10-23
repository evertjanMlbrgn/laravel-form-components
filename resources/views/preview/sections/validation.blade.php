<x-form::preview.components.section id="form-validation" title="Validation" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/validation/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Client-side validation">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3" validation-mode="client-default">
    <div class="col-md-4">
        <x-form-input id="validationDefault01" label="First name" value="Mark" required/>
    </div>
    <div class="col-md-4">
        <x-form-input id="validationDefault02" label="Last name" value="Otto" required/>
    </div>
    <div class="col-12">
        <x-form-checkbox id="invalidCheck2" label="Agree to terms and conditions" required/>
    </div>
    <div class="col-12">
        <x-form-submit>Submit form</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3" validation-mode="client-default">
            <div class="col-md-4">
                <x-form-input id="validationDefault01" label="First name" value="Mark" required/>
            </div>
            <div class="col-md-4">
                <x-form-input id="validationDefault02" label="Last name" value="Otto" required/>
            </div>
            <div class="col-12">
                <x-form-checkbox id="invalidCheck2" label="Agree to terms and conditions" required/>
            </div>
            <div class="col-12">
                <x-form-submit>Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
