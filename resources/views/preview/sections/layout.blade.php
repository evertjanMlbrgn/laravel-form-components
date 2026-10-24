<x-form::preview.components.section id="form-layout" title="Layout" description="Form components can be arranged in various layouts, including horizontal and grid-based structures.">
    <x-form::preview.components.example title="Horizontal form">
        <x-slot:code_slot>
            @verbatim
<x-form-input horizontal id="inputEmail3" label="Email" name="email" type="email"/>
<x-form-textarea horizontal id="inputBio" label="Biography" name="bio"/>
<x-form-select horizontal id="inputCountry" label="Country" name="country" :options="$selectOptions" placeholder="Choose..."/>
<x-form-group horizontal label="Options">
    <x-form-radio name="options" value="1" label="Option 1" />
    <x-form-radio name="options" value="2" label="Option 2" />
</x-form-group>
<x-form-submit>Sign in</x-form-submit>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form>
            <x-form-input horizontal id="inputEmail3" label="Email" name="email" type="email"/>
            <x-form-textarea horizontal id="inputBio" label="Biography" name="bio" class="mb-3"/>
            <x-form-select horizontal id="inputCountry" label="Country" name="country" :options="$selectOptions" placeholder="Choose..."/>
            <x-form-group horizontal label="Options" class="mb-3">
                <x-form-radio name="options" value="1" label="Option 1" />
                <x-form-radio name="options" value="2" label="Option 2" />
            </x-form-group>
            <div class="{{ theme_class('wrapper_horizontal') }} mb-3">
                <div class="{{ theme_class('wrapper_horizontal_control') }} offset-sm-2">
                    <x-form-checkbox id="gridCheck1" label="Example checkbox"/>
                </div>
            </div>
            <x-form-submit>Sign in</x-form-submit>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Horizontal form label sizing">
        <x-slot:code_slot>
            @verbatim
<x-form-input horizontal label="Email" type="email" placeholder="Email"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input horizontal label="Email" type="email" placeholder="Email" class="mb-3"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Multi-column Layout">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="email" label="Email" id="inputEmail4" autocomplete="username"/>
<x-form-input type="password" label="Password" id="inputPassword8" autocomplete="new-password"/>
<x-form-input type="text" id="inputAddress" label="Address" placeholder="1234 Main St"/>
<x-form-input type="text" label="City" id="inputCity"/>
<x-form-select id="inputStateMulti" label="State" :options="['ks' => 'Kansas', 'co' => 'Colorado']" placeholder="Choose..."/>
<x-form-input type="text" label="Zip" id="inputZip"/>
<x-form-submit>Sign in</x-form-submit>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="mfc-demo-grid">
            <div class="mfc-demo-col-md-6">
                <x-form-input type="email" label="Email" id="inputEmail4" autocomplete="username"/>
            </div>
            <div class="mfc-demo-col-md-6">
                <x-form-input type="password" label="Password" id="inputPassword8" autocomplete="new-password"/>
            </div>
            <div class="mfc-demo-col-12">
                <x-form-input type="text" id="inputAddress" label="Address" placeholder="1234 Main St"/>
            </div>
            <div class="mfc-demo-col-md-6">
                <x-form-input type="text" label="City" id="inputCity"/>
            </div>
            <div class="mfc-demo-col-md-4">
                <x-form-select id="inputStateMulti" label="State">
                    <option selected>Choose...</option>
                    <option>Kansas</option>
                    <option>Colorado</option>
                </x-form-select>
            </div>
            <div class="mfc-demo-col-md-2">
                <x-form-input type="text" label="Zip" id="inputZip"/>
            </div>
            <div class="mfc-demo-col-12">
                <x-form-submit>Sign in</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Inline forms">
        <x-slot:code_slot>
            @verbatim
<x-form-form>
    <x-form-input label="Username" placeholder="Username"/>
    <x-form-select label="Preference">
        <option selected>Choose...</option>
        <option value="1">One</option>
    </x-form-select>
    <x-form-checkbox label="Remember me"/>
    <x-form-submit>Submit</x-form-submit>
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
