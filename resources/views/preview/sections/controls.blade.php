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
<x-form-input type="text" placeholder="Disabled input" disabled/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input class="form-control-lg mb-3" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"/>
        <x-form-input class="mb-3" type="text" placeholder="Default input" aria-label="default input example"/>
        <x-form-input class="form-control-sm mb-3" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example"/>
        <x-form-input type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Readonly and Plaintext">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="text" value="Readonly input here..." readonly/>

<!-- Horizontal Plaintext -->
<x-form-input readonly class="form-control-plaintext" label="Email" value="email@example.com" horizontal/>

<!-- Inline Plaintext -->
<x-form-form class="row g-3">
    <div class="col-auto">
        <x-form-input readonly class="form-control-plaintext" label="Email" value="email@example.com" class-label="visually-hidden"/>
    </div>
    <div class="col-auto">
        <x-form-input type="password" placeholder="Password" class-label="visually-hidden"/>
    </div>
    <div class="col-auto">
        <x-form-submit>Confirm identity</x-form-submit>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input class="mb-3" type="text" value="Readonly input here..." aria-label="readonly input example" readonly/>
        <x-form-form>
            <x-form-input readonly class="form-control-plaintext mb-3" id="staticEmail" label="Email" value="email@example.com" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="username"/>
        </x-form-form>
        <x-form-form class="row g-3">
            <div class="col-auto">
                <x-form-input readonly class="form-control-plaintext" label="Email" id="staticEmail2" value="email@example.com" class-label="visually-hidden" autocomplete="username"/>
            </div>
            <div class="col-auto">
                <x-form-input type="password" id="inputPassword7" label="Password" placeholder="Password" class-label="visually-hidden" autocomplete="new-password"/>
            </div>
            <div class="col-auto">
                <x-form-submit class="btn-preview-primary mb-3">Confirm identity</x-form-submit>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="File inputs">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="file" id="formFile" label="Default file input example"/>
<x-form-input type="file" id="formFileMultiple" multiple label="Multiple files input example"/>
<x-form-input type="file" id="formFileDisabled" disabled label="Disabled file input example"/>
<x-form-input class="form-control-sm" type="file" label="Small file input example"/>
<x-form-input class="form-control-lg" type="file" label="Large file input example"/>
            @endverbatim
        </x-slot:code_slot>
        <div class="mb-3">
            <x-form-input type="file" id="formFile" label="Default file input example"/>
        </div>
        <div class="mb-3">
            <x-form-input type="file" id="formFileMultiple" multiple label="Multiple files input example"/>
        </div>
        <div class="mb-3">
            <x-form-input type="file" id="formFileDisabled" disabled label="Disabled file input example"/>
        </div>
        <div class="mb-3">
            <x-form-input class="form-control-sm" id="formFileSm" type="file" label="Small file input example"/>
        </div>
        <div class="mb-3">
            <x-form-input class="form-control-lg" id="formFileLg" type="file" label="Large file input example"/>
        </div>
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
    <x-form::preview.components.example title="All Native Input Types">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="text" label="Text" name="native_text" />
<x-form-input type="password" label="Password" name="native_password" />
<x-form-input type="email" label="Email" name="native_email" />
<x-form-input type="number" label="Number" name="native_number" />
<x-form-input type="tel" label="Tel" name="native_tel" />
<x-form-input type="url" label="Url" name="native_url" />
<x-form-input type="search" label="Search" name="native_search" />
<x-form-input type="date" label="Date" name="native_date" />
<x-form-input type="datetime-local" label="DateTime Local" name="native_datetime" />
<x-form-input type="month" label="Month" name="native_month" />
<x-form-input type="week" label="Week" name="native_week" />
<x-form-input type="time" label="Time" name="native_time" />
<x-form-input type="color" label="Color" name="native_color" />
<x-form-input type="range" label="Range" name="native_range" />
<x-form-input type="file" label="File" name="native_file" />
<x-form-input type="hidden" name="native_hidden" value="secret" />
            @endverbatim
        </x-slot:code_slot>
        <div class="row">
            <div class="col-md-6">
                <x-form-input type="text" label="Text" name="native_text" />
                <x-form-input type="password" label="Password" name="native_password" />
                <x-form-input type="email" label="Email" name="native_email" />
                <x-form-input type="number" label="Number" name="native_number" />
                <x-form-input type="tel" label="Tel" name="native_tel" />
                <x-form-input type="url" label="Url" name="native_url" />
                <x-form-input type="search" label="Search" name="native_search" />
            </div>
            <div class="col-md-6">
                <x-form-input type="date" label="Date" name="native_date" />
                <x-form-input type="datetime-local" label="DateTime Local" name="native_datetime" />
                <x-form-input type="month" label="Month" name="native_month" />
                <x-form-input type="week" label="Week" name="native_week" />
                <x-form-input type="time" label="Time" name="native_time" />
                <x-form-input type="color" label="Color" name="native_color" class="form-control-color" />
                <x-form-input type="range" label="Range" name="native_range" />
            </div>
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
