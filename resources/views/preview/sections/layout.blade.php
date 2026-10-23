<x-form::preview.components.section id="form-layout" title="Layout" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/layout/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Horizontal form">
        <x-slot:code_slot>
            @verbatim
<x-form-input horizontal id="inputEmail3" label="Email" name="email" type="email"/>
<x-form-input horizontal id="inputPassword3" label="Password" name="password" type="password"/>
<x-form-select horizontal id="inputState" label="Country" name="country" :options="$selectOptions" placeholder="Choose..."/>
<x-form-checkbox horizontal id="gridCheck1" label="Example checkbox"/>
<x-form-submit>Sign in</x-form-submit>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form>
            <x-form-input horizontal id="inputEmail3" label="Email" name="email" type="email"/>
            <x-form-input horizontal id="inputPassword3" label="Password" name="password" type="password"/>
            <x-form-select horizontal id="inputState" label="Country" name="country" :options="$selectOptions" placeholder="Choose..."/>
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <x-form-checkbox id="gridCheck1" label="Example checkbox"/>
                </div>
            </div>
            <x-form-submit>Sign in</x-form-submit>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Horizontal form label sizing">
        <x-slot:code_slot>
            @verbatim
<x-form-input horizontal class-horizontal-cols-label="col-sm-2" class-horizontal-cols-control="col-sm-10" label="Email" type="email" placeholder="Email"/>
<x-form-input horizontal class-horizontal-cols-label="col-sm-2" class-horizontal-cols-control="col-sm-10" class="form-control-sm" label="Email" type="email" placeholder="Email"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input horizontal class-horizontal-cols-label="col-sm-2" class-horizontal-cols-control="col-sm-10" label="Email" type="email" placeholder="Email" class="mb-3"/>
        <x-form-input horizontal class-horizontal-cols-label="col-sm-2" class-horizontal-cols-control="col-sm-10" class="form-control-sm" label="Email" type="email" placeholder="Email"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Complex layout">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3">
    <div class="col-md-6">
        <x-form-input type="email" label="Email" id="inputEmail4" autocomplete="username"/>
    </div>
    <div class="col-md-6">
        <x-form-input type="password" label="Password" id="inputPassword8" autocomplete="new-password"/>
    </div>
    <div class="col-12">
        <x-form-input type="text" id="inputAddress" label="Address" placeholder="1234 Main St"/>
    </div>
    <div class="col-12">
        <x-form-input type="text" id="inputAddress2" label="Address 2" placeholder="Apartment, studio, or floor"/>
    </div>
    <div class="col-md-6">
        <x-form-input type="text" label="City" id="inputCity"/>
    </div>
    <div class="col-md-4">
        <x-form-select id="inputState" label="State">
            <option selected>Choose...</option>
            <option>Kansas</option>
            <option>Colorado</option>
        </x-form-select>
    </div>
    <div class="col-md-2">
        <x-form-input type="text" label="Zip" id="inputZip"/>
    </div>
    <div class="col-12">
        <x-form-checkbox label="Check me out" id="gridCheck"/>
    </div>
    <div class="col-12">
        <x-form-submit>Sign in</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3">
            <div class="col-md-6">
                <x-form-input type="email" label="Email" id="inputEmail4" autocomplete="username"/>
            </div>
            <div class="col-md-6">
                <x-form-input type="password" label="Password" id="inputPassword8" autocomplete="new-password"/>
            </div>
            <div class="col-12">
                <x-form-input type="text" id="inputAddress" label="Address" placeholder="1234 Main St"/>
            </div>
            <div class="col-12">
                <x-form-input type="text" id="inputAddress2" label="Address 2" placeholder="Apartment, studio, or floor"/>
            </div>
            <div class="col-md-6">
                <x-form-input type="text" label="City" id="inputCity"/>
            </div>
            <div class="col-md-4">
                <x-form-select id="inputState" label="State">
                    <option selected>Choose...</option>
                    <option>Kansas</option>
                    <option>Colorado</option>
                </x-form-select>
            </div>
            <div class="col-md-2">
                <x-form-input type="text" label="Zip" id="inputZip"/>
            </div>
            <div class="col-12">
                <x-form-checkbox label="Check me out" id="gridCheck"/>
            </div>
            <div class="col-12">
                <x-form-submit class="btn-preview-primary">Sign in</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Form grid & Gutters">
        <x-slot:code_slot>
            @verbatim
<div class="row mb-3">
    <div class="col">
        <x-form-input type="text" placeholder="First name" aria-label="First name"/>
    </div>
    <div class="col">
        <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
    </div>
</div>

<div class="row g-3">
    <div class="col">
        <x-form-input type="text" placeholder="First name" aria-label="First name"/>
    </div>
    <div class="col">
        <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
    </div>
</div>
            @endverbatim
        </x-slot:code_slot>
        <div class="row mb-3">
            <div class="col">
                <x-form-input type="text" placeholder="First name" aria-label="First name"/>
            </div>
            <div class="col">
                <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <x-form-input type="text" placeholder="First name" aria-label="First name"/>
            </div>
            <div class="col">
                <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
            </div>
        </div>
    </x-form::preview.components.example>
    <x-form::preview.components.example title="Column sizing">
        <x-slot:code_slot>
            @verbatim
<div class="row g-3">
    <div class="col-sm-7">
        <x-form-input type="text" placeholder="City" aria-label="City"/>
    </div>
    <div class="col-sm">
        <x-form-input type="text" placeholder="State" aria-label="State"/>
    </div>
    <div class="col-sm">
        <x-form-input type="text" placeholder="Zip" aria-label="Zip"/>
    </div>
</div>
            @endverbatim
        </x-slot:code_slot>
        <div class="row g-3">
            <div class="col-sm-7">
                <x-form-input type="text" placeholder="City" aria-label="City"/>
            </div>
            <div class="col-sm">
                <x-form-input type="text" placeholder="State" aria-label="State"/>
            </div>
            <div class="col-sm">
                <x-form-input type="text" placeholder="Zip" aria-label="Zip"/>
            </div>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Auto-sizing">
        <x-slot:code_slot>
            @verbatim
<form class="row gy-2 gx-3 align-items-center">
    <div class="col-auto">
        <x-form-input type="text" id="autoSizingInput" label="Name" placeholder="Jane Doe" class-label="visually-hidden"/>
    </div>
    <div class="col-auto">
        <x-form-input-group>
            <x-slot name="slot1">
                <div class="input-group-text">@</div>
            </x-slot>
            <x-slot name="slot2">
                <x-form-input type="text" id="autoSizingInputGroup" label="Username" placeholder="Username" class-label="visually-hidden"/>
            </x-slot>
            <x-slot name="slot3">
                <div class="input-group-text">$</div>
            </x-slot>
            <x-slot name="slot4">
                <div class="input-group-text">#</div>
            </x-slot>
            <x-slot name="slot5">
                <div class="input-group-text">!</div>
            </x-slot>
        </x-form-input-group>
    </div>
    <div class="col-auto">
        <x-form-select label="Preference" id="autoSizingSelect" class-label="visually-hidden">
            <option selected>Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </x-form-select>
    </div>
    <div class="col-auto">
        <x-form-checkbox label="Remember me" id="autoSizingCheck"/>
    </div>
    <div class="col-auto">
        <x-form-submit>Submit</x-form-submit>
    </div>
</form>
            @endverbatim
        </x-slot:code_slot>
        <form class="row gy-2 gx-3 align-items-center">
            <div class="col-auto">
                <x-form-input type="text" id="autoSizingInput" label="Name" placeholder="Jane Doe" class-label="visually-hidden"/>
            </div>
            <div class="col-auto">
                <x-form-input-group>
                    <x-slot name="slot1">
                        <div class="input-group-text">@</div>
                    </x-slot>
                    <x-slot name="slot2">
                        <x-form-input type="text" id="autoSizingInputGroup" label="Username" placeholder="Username" class-label="visually-hidden"/>
                    </x-slot>
                    <x-slot name="slot3">
                        <div class="input-group-text">$</div>
                    </x-slot>
                    <x-slot name="slot4">
                        <div class="input-group-text">#</div>
                    </x-slot>
                    <x-slot name="slot5">
                        <div class="input-group-text">!</div>
                    </x-slot>
                </x-form-input-group>
            </div>
            <div class="col-auto">
                <x-form-select label="Preference" id="autoSizingSelect" class-label="visually-hidden">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>
            </div>
            <div class="col-auto">
                <x-form-checkbox label="Remember me" id="autoSizingCheck"/>
            </div>
            <div class="col-auto">
                <x-form-submit class="btn-preview-primary">Submit</x-form-submit>
            </div>
        </form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Inline forms">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row row-cols-lg-auto g-3 align-items-center">
    <div class="col-12">
        <x-form-input label="Username" class-label="visually-hidden" placeholder="Username"/>
    </div>
    <div class="col-12">
        <x-form-select label="Preference" class-label="visually-hidden">
            <option selected>Choose...</option>
            <option value="1">One</option>
        </x-form-select>
    </div>
    <div class="col-12">
        <x-form-checkbox label="Remember me"/>
    </div>
    <div class="col-12">
        <x-form-submit>Submit</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row row-cols-lg-auto g-3 align-items-center">
            <div class="col-12">
                <x-form-input label="Username" class-label="visually-hidden" id="inlineFormInputGroupUsername" placeholder="Username"/>
            </div>
            <div class="col-12">
                <x-form-select label="Preference" class-label="visually-hidden" id="inlineFormSelectPref">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>
            </div>
            <div class="col-12">
                <x-form-checkbox label="Remember me" id="inlineFormCheck"/>
            </div>
            <div class="col-12">
                <x-form-submit class="btn-preview-primary">Submit</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
