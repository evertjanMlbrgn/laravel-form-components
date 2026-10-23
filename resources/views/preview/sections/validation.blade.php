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
<x-form-form class="row g-3" validation-mode="server">
    <div class="col-md-4">
        <x-form-input class="is-valid" id="validationServer01" value="Mark" required label="First name"/>
        <div class="valid-feedback">Looks good!</div>
    </div>
    <div class="col-md-4">
        <x-form-input class="is-valid" id="validationServer02" value="Otto" required label="Last name"/>
        <div class="valid-feedback">Looks good!</div>
    </div>
    <div class="col-md-4">
        <label for="validationServerUsername" class="form-label">Username</label>
        <x-form-input-group class="has-validation">
            <x-form-input-group-text id="inputGroupPrepend4">@</x-form-input-group-text>
            <x-form-input class="is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend4" required/>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                Please choose a username.
            </div>
        </x-form-input-group>
    </div>
    <div class="col-md-6">
        <x-form-input class="is-invalid" id="validationServer03" required label="City"/>
        <div id="validationServer03Feedback" class="invalid-feedback">
            Please provide a valid city.
        </div>
    </div>
    <div class="col-md-3">
        <x-form-select class="is-invalid" id="validationServer04" required label="State" placeholder="Choose...">
            <option>...</option>
        </x-form-select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select a valid state.
        </div>
    </div>
    <div class="col-md-3">
        <x-form-input class="is-invalid" id="validationServer05" required label="Zip"/>
        <div id="validationServer05Feedback" class="invalid-feedback">
            Please provide a valid zip.
        </div>
    </div>
    <div class="col-12">
        <x-form-checkbox class="is-invalid" value="" id="invalidCheck5" required label="Agree to terms and conditions"/>
        <div id="invalidCheck5Feedback" class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
    <div class="col-12">
        <x-form-submit>Submit form</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3" validation-mode="server">
            <div class="col-md-4">
                <x-form-input class="is-valid" id="validationServer01" value="Mark" required label="First name"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <x-form-input class="is-valid" id="validationServer02" value="Otto" required label="Last name"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label for="validationServerUsername" class="form-label">Username</label>
                <x-form-input-group class="has-validation">
                    <x-form-input-group-text id="inputGroupPrepend4">@</x-form-input-group-text>
                    <x-form-input class="is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend4" required/>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Please choose a username.
                    </div>
                </x-form-input-group>
            </div>
            <div class="col-md-6">
                <x-form-input class="is-invalid" id="validationServer03" required label="City"/>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <x-form-select class="is-invalid" id="validationServer04" required label="State" placeholder="Choose...">
                    <option>...</option>
                </x-form-select>
                <div id="validationServer04Feedback" class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <x-form-input class="is-invalid" id="validationServer05" required label="Zip"/>
                <div id="validationServer05Feedback" class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
            <div class="col-12">
                <x-form-checkbox class="is-invalid" value="" id="invalidCheck5" required label="Agree to terms and conditions"/>
                <div id="invalidCheck5Feedback" class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
            <div class="col-12">
                <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Tooltips">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3 needs-validation" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
    <div class="col-md-4 position-relative">
        <x-form-input id="validationTooltip01" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Awful!" tooltip-feedback/>
    </div>
    <div class="col-md-4 position-relative">
        <x-form-input id="validationTooltip02" value="Otto" label="Last name" required valid-feedback="All set!" invalid-feedback="Not the way to go" tooltip-feedback/>
    </div>
    <div class="col-md-4 position-relative">
        <label for="validationTooltipUsername" class="form-label">Username</label>
        <x-form-input-group class="has-validation">
            <x-form-input-group-text id="validationTooltipUsernamePrepend">@</x-form-input-group-text>
            <x-form-input id="validationTooltipUsername" required valid-feedback="Wow!" invalid-feedback="Please choose a unique and valid username." tooltip-feedback/>
        </x-form-input-group>
    </div>
    <div class="col-md-6 position-relative">
        <x-form-input id="validationTooltip03" required valid-feedback="Nice city!" invalid-feedback="Please provide a valid city." tooltip-feedback label="City"/>
    </div>
    <div class="col-md-3 position-relative">
        <x-form-select id="validationTooltip04" required label="State" valid-feedback="Great state!" invalid-feedback="Please select a valid state." tooltip-feedback placeholder="Choose...">
            <option>...</option>
        </x-form-select>
    </div>
    <div class="col-12">
        <x-form-submit>Submit form</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3 needs-validation" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
            <div class="col-md-4 position-relative">
                <x-form-input id="validationTooltip01" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Awful!" tooltip-feedback/>
            </div>
            <div class="col-md-4 position-relative">
                <x-form-input id="validationTooltip02" value="Otto" label="Last name" required valid-feedback="All set!" invalid-feedback="Not the way to go" tooltip-feedback/>
            </div>
            <div class="col-md-4 position-relative">
                <label for="validationTooltipUsername" class="form-label">Username</label>
                <x-form-input-group class="has-validation">
                    <x-form-input-group-text id="validationTooltipUsernamePrepend">@</x-form-input-group-text>
                    <x-form-input id="validationTooltipUsername" required valid-feedback="Wow!" invalid-feedback="Please choose a unique and valid username." tooltip-feedback/>
                </x-form-input-group>
            </div>
            <div class="col-md-6 position-relative">
                <x-form-input id="validationTooltip03" required valid-feedback="Nice city!" invalid-feedback="Please provide a valid city." tooltip-feedback label="City"/>
            </div>
            <div class="col-md-3 position-relative">
                <x-form-select id="validationTooltip04" required label="State" valid-feedback="Great state!" invalid-feedback="Please select a valid state." tooltip-feedback placeholder="Choose...">
                    <option>...</option>
                </x-form-select>
            </div>
            <div class="col-12 mt-5">
                <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
