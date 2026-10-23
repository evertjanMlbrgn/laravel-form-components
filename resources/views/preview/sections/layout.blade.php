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
            <x-form-checkbox horizontal id="gridCheck1" label="Example checkbox"/>
            <x-form-submit>Sign in</x-form-submit>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
