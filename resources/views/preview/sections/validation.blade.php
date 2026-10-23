<x-form::preview.components.section id="form-validation" title="Validation" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/validation/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Client-side validation (Bootstrap 5)">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
    <div class="col-md-4">
        <x-form-input label="First name" value="Mark" required />
    </div>
    <div class="col-md-4">
        <x-form-input label="Last name" value="Otto" required />
    </div>
    <div class="col-md-6">
        <x-form-input label="City" required invalid-feedback="Please provide a valid city." />
    </div>
    <div class="col-md-3">
        <x-form-select label="State" required invalid-feedback="Please select a valid state.">
            <option selected disabled value="">Choose...</option>
            <option>...</option>
        </x-form-select>
    </div>
    <div class="col-12">
        <x-form-checkbox label="Agree to terms and conditions" required invalid-feedback="You must agree before submitting." />
    </div>
    <div class="col-12">
        <x-form-submit>Submit form</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
            <div class="col-md-4">
                <x-form-input label="First name" value="Mark" required />
            </div>
            <div class="col-md-4">
                <x-form-input label="Last name" value="Otto" required />
            </div>
            <div class="col-md-6">
                <x-form-input label="City" required invalid-feedback="Please provide a valid city." />
            </div>
            <div class="col-md-3">
                <x-form-select label="State" required invalid-feedback="Please select a valid state.">
                    <option selected disabled value="">Choose...</option>
                    <option>Kansas</option>
                    <option>Colorado</option>
                </x-form-select>
            </div>
            <div class="col-12">
                <x-form-checkbox label="Agree to terms and conditions" required invalid-feedback="You must agree before submitting." />
            </div>
            <div class="col-12">
                <x-form-submit>Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Browser defaults">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3" validation-mode="client-default">
    <div class="col-md-4">
        <x-form-input label="First name" value="Mark" required />
    </div>
    <div class="col-md-4">
        <x-form-input label="Last name" value="Otto" required />
    </div>
    <div class="col-12">
        <x-form-submit>Submit form</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3" validation-mode="client-default">
            <div class="col-md-4">
                <x-form-input label="First name" value="Mark" required />
            </div>
            <div class="col-md-4">
                <x-form-input label="Last name" value="Otto" required />
            </div>
            <div class="col-12">
                <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Server side (manual classes)">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3">
    <div class="col-md-4">
        <x-form-input class="is-valid" label="First name" value="Mark" required />
        <div class="valid-feedback">Looks good!</div>
    </div>
    <div class="col-md-4">
        <x-form-input class="is-invalid" label="Last name" value="Otto" required />
        <div class="invalid-feedback">Please choose a username.</div>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3">
            <div class="col-md-4">
                <x-form-input class="is-valid" label="First name" value="Mark" required />
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <x-form-input class="is-invalid" label="Last name" value="Otto" required />
                <div class="invalid-feedback">Please provide a valid name.</div>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Tooltips">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
    <div class="col-md-4 position-relative">
        <x-form-input label="City" required tooltip-feedback invalid-feedback="Please provide a valid city." />
    </div>
    <div class="col-12 mt-5">
        <x-form-submit>Submit form</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
            <div class="col-md-4 position-relative">
                <x-form-input label="City" required tooltip-feedback invalid-feedback="Please provide a valid city." />
            </div>
            <div class="col-12 mt-5">
                <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
