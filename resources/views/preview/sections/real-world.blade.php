<x-form::preview.components.section id="form-real-world" title="Real world example" description="A comprehensive example of a registration form using various components and layouts.">
    <x-form::preview.components.example title="User Registration">
        <x-slot:code_slot>
            @verbatim
<x-form-form class="row g-3">
    <div class="col-md-6">
        <x-form-input label="Email" name="reg_email" type="email" placeholder="email@example.com" required/>
    </div>
    <div class="col-md-6">
        <x-form-input label="Password" name="reg_password" type="password" required/>
    </div>
    <div class="col-12">
        <x-form-input label="Address" name="reg_address" placeholder="1234 Main St"/>
    </div>
    <div class="col-md-6">
        <x-form-input label="City" name="reg_city"/>
    </div>
    <div class="col-md-4">
        <x-form-select label="State" name="reg_state" :options="['ny' => 'New York', 'ca' => 'California']" placeholder="Choose..."/>
    </div>
    <div class="col-md-2">
        <x-form-input label="Zip" name="reg_zip"/>
    </div>
    <div class="col-12">
        <x-form-checkbox label="Check me out" name="reg_check" id="regCheck"/>
    </div>
    <div class="col-12">
        <x-form-submit>Register</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form class="row g-3">
            <x-form-input type="hidden" name="should_validate" value="1" />
            <div class="col-md-6">
                <x-form-input label="Email" name="reg_email" type="email" placeholder="email@example.com" required/>
            </div>
            <div class="col-md-6">
                <x-form-input label="Password" name="reg_password" type="password" required/>
            </div>
            <div class="col-12">
                <x-form-input label="Address" name="reg_address" placeholder="1234 Main St"/>
            </div>
            <div class="col-md-6">
                <x-form-input label="City" name="reg_city"/>
            </div>
            <div class="col-md-4">
                <x-form-select label="State" name="reg_state" :options="['ny' => 'New York', 'ca' => 'California']" placeholder="Choose..."/>
            </div>
            <div class="col-md-2">
                <x-form-input label="Zip" name="reg_zip"/>
            </div>
            <div class="col-12">
                <x-form-checkbox label="Check me out" name="reg_check" id="regCheck"/>
            </div>
            <div class="col-12">
                <x-form-submit>Register</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
