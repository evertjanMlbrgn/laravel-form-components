<x-form::preview.components.section id="form-controls" title="Form controls" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/form-control/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Example">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="email" id="exampleFormControlInput1" label="Email address" placeholder="name@example.com" required/>
<x-form-textarea id="exampleFormControlTextarea1" label="Example textarea" rows="3"></x-form-textarea>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="email" id="exampleFormControlInput1" label="Email address" placeholder="name@example.com" required/>
        <x-form-textarea id="exampleFormControlTextarea1" label="Example textarea" rows="3"></x-form-textarea>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Sizing">
        <x-slot:code_slot>
            @verbatim
<x-form-input class="form-control-lg" type="text" placeholder=".form-control-lg"/>
<x-form-input type="text" placeholder="Default input"/>
<x-form-input class="form-control-sm" type="text" placeholder=".form-control-sm"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input class="form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"/>
        <x-form-input type="text" placeholder="Default input" aria-label="default input example"/>
        <x-form-input class="form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Readonly and Plaintext">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="text" value="Readonly input here..." readonly/>
<x-form-input readonly class="form-control-plaintext" id="staticEmail" label="Email" value="email@example.com" horizontal/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="text" value="Readonly input here..." aria-label="readonly input example" readonly/>
        <x-form-form>
            <x-form-input readonly class="form-control-plaintext" id="staticEmail" label="Email" value="email@example.com" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="username"/>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="File inputs">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="file" id="formFile" label="Default file input example"/>
<x-form-input type="file" id="formFileMultiple" multiple label="Multiple files input example"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="file" id="formFile" label="Default file input example"/>
        <x-form-input type="file" id="formFileMultiple" multiple label="Multiple files input example"/>
        <x-form-input class="form-control-sm" id="formFileSm" type="file" label="Small file input example"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Others (Color, Datalist)">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="color" id="exampleColorInput" value="#563d7c" label="Color picker"/>
<x-form-input list="datalistOptions" id="exampleDataList" label="Datalist example"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="color" class="form-control-color" id="exampleColorInput" value="#563d7c" label="Color picker" title="Choose your color"/>
        <x-form-input list="datalistOptions" id="exampleDataList" label="Datalist example" placeholder="Type to search..."/>
        <datalist id="datalistOptions">
            <option value="San Francisco">San Francisco</option>
            <option value="New York">New York</option>
            <option value="Seattle">Seattle</option>
            <option value="Los Angeles">Los Angeles</option>
            <option value="Chicago">Chicago</option>
        </datalist>
    </x-form::preview.components.example>
</x-form::preview.components.section>
