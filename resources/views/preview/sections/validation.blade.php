<x-form::preview.components.section id="form-validation" title="Validation" description="This section demonstrates client-side and server-side validation using form components.">
    <x-form::preview.components.example title="Client-side validation">
        <x-slot:code_slot>
            @verbatim
<x-form-form validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
    <x-form-input label="First name" value="Mark" required />
    <x-form-input label="Last name" value="Otto" required />
    <x-form-input label="City" required invalid-feedback="Please provide a valid city." />
    <x-form-select label="State" required invalid-feedback="Please select a valid state.">
        <option selected disabled value="">Choose...</option>
        <option>Kansas</option>
        <option>Colorado</option>
    </x-form-select>
    <x-form-checkbox label="Agree to terms and conditions" required invalid-feedback="You must agree before submitting." />
    <x-form-submit>Submit form</x-form-submit>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="mfc-demo-grid" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
            <div class="mfc-demo-col-md-4">
                <x-form-input label="First name" value="Mark" required />
            </div>
            <div class="mfc-demo-col-md-4">
                <x-form-input label="Last name" value="Otto" required />
            </div>
            <div class="mfc-demo-col-md-6">
                <x-form-input label="City" required invalid-feedback="Please provide a valid city." />
            </div>
            <div class="mfc-demo-col-md-3">
                <x-form-select label="State" required invalid-feedback="Please select a valid state.">
                    <option selected disabled value="">Choose...</option>
                    <option>Kansas</option>
                    <option>Colorado</option>
                </x-form-select>
            </div>
            <div class="mfc-demo-col-12">
                <x-form-checkbox label="Agree to terms and conditions" required invalid-feedback="You must agree before submitting." />
            </div>
            <div class="mfc-demo-col-12">
                <x-form-submit>Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Browser defaults">
        <x-slot:code_slot>
            @verbatim
<x-form-form validation-mode="client-default">
    <x-form-input label="First name" value="Mark" required />
    <x-form-input label="Last name" value="Otto" required />
    <x-form-submit>Submit form</x-form-submit>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="mfc-demo-grid" validation-mode="client-default">
            <div class="mfc-demo-col-md-4">
                <x-form-input label="First name" value="Mark" required />
            </div>
            <div class="mfc-demo-col-md-4">
                <x-form-input label="Last name" value="Otto" required />
            </div>
            <div class="mfc-demo-col-12">
                <x-form-submit>Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Server side feedback">
        <x-slot:code_slot>
            @verbatim
<x-form-form validation-mode="server">
    <x-form-input value="Mark" required label="First name" valid-feedback="Looks good!" />
    <x-form-input value="Otto" required label="Last name" valid-feedback="Looks good!" />
    <x-form-input-group>
        <x-form-input-group-text>@</x-form-input-group-text>
        <x-form-input label="Username" required invalid-feedback="Please choose a username." />
    </x-form-input-group>
    <x-form-input required label="City" invalid-feedback="Please provide a valid city." />
    <x-form-select required label="State" placeholder="Choose..." invalid-feedback="Please select a valid state.">
        <option>Kansas</option>
    </x-form-select>
    <x-form-input required label="Zip" invalid-feedback="Please provide a valid zip." />
    <x-form-checkbox required label="Agree to terms and conditions" invalid-feedback="You must agree before submitting." />
    <x-form-submit>Submit form</x-form-submit>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="mfc-demo-grid" validation-mode="server">
            <div class="mfc-demo-col-md-4">
                <x-form-input value="Mark" required label="First name" valid-feedback="Looks good!" />
            </div>
            <div class="mfc-demo-col-md-4">
                <x-form-input value="Otto" required label="Last name" valid-feedback="Looks good!" />
            </div>
            <div class="mfc-demo-col-md-4">
                <x-form-input-group>
                    <x-form-input-group-text>@</x-form-input-group-text>
                    <x-form-input label="Username" required invalid-feedback="Please choose a username." />
                </x-form-input-group>
            </div>
            <div class="mfc-demo-col-md-6">
                <x-form-input required label="City" invalid-feedback="Please provide a valid city." />
            </div>
            <div class="mfc-demo-col-md-3">
                <x-form-select required label="State" placeholder="Choose..." invalid-feedback="Please select a valid state.">
                    <option>Kansas</option>
                </x-form-select>
            </div>
            <div class="mfc-demo-col-md-3">
                <x-form-input required label="Zip" invalid-feedback="Please provide a valid zip." />
            </div>
            <div class="mfc-demo-col-12">
                <x-form-checkbox required label="Agree to terms and conditions" invalid-feedback="You must agree before submitting." />
            </div>
            <div class="mfc-demo-col-12">
                <x-form-submit>Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Tooltips">
        <x-slot:code_slot>
            @verbatim
<x-form-form validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
    <x-form-input value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Awful!" tooltip-feedback />
    <x-form-input value="Otto" label="Last name" required valid-feedback="All set!" invalid-feedback="Not the way to go" tooltip-feedback />
    <x-form-input label="Username" required valid-feedback="Wow!" invalid-feedback="Please choose a unique and valid username." tooltip-feedback />
    <x-form-input label="City" required valid-feedback="Nice city!" invalid-feedback="Please provide a valid city." tooltip-feedback />
    <x-form-select label="State" required valid-feedback="Great state!" invalid-feedback="Please select a valid state." tooltip-feedback placeholder="Choose...">
        <option>Kansas</option>
    </x-form-select>
    <x-form-submit>Submit form</x-form-submit>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="mfc-demo-grid" validation-mode="client-custom" onsubmit="event.preventDefault(); return false;">
            <div class="mfc-demo-col-md-4">
                <x-form-input id="validationTooltip01" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Awful!" tooltip-feedback />
            </div>
            <div class="mfc-demo-col-md-4">
                <x-form-input id="validationTooltip02" value="Otto" label="Last name" required valid-feedback="All set!" invalid-feedback="Not the way to go" tooltip-feedback />
            </div>
            <div class="mfc-demo-col-md-4">
                <x-form-input id="validationTooltipUsername" label="Username" required valid-feedback="Wow!" invalid-feedback="Please choose a unique and valid username." tooltip-feedback />
            </div>
            <div class="mfc-demo-col-md-6">
                <x-form-input id="validationTooltip03" required valid-feedback="Nice city!" invalid-feedback="Please provide a valid city." tooltip-feedback label="City" />
            </div>
            <div class="mfc-demo-col-md-3">
                <x-form-select id="validationTooltip04" required label="State" valid-feedback="Great state!" invalid-feedback="Please select a valid state." tooltip-feedback placeholder="Choose...">
                    <option>Kansas</option>
                </x-form-select>
            </div>
            <div class="mfc-demo-col-12">
                <x-form-submit>Submit form</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
