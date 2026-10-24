<x-form::preview.components.section id="form-controls" title="Form controls" description="Standard form controls such as inputs and textareas.">
    <x-form::preview.components.example title="Basic Usage">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="email" id="exampleInput1" label="Email address" placeholder="name@example.com" required/>
<x-form-textarea id="exampleTextarea1" label="Example textarea" rows="3"></x-form-textarea>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="email" id="exampleInput1" label="Email address" placeholder="name@example.com" required/>
        <x-form-textarea id="exampleTextarea1" label="Example textarea" rows="3"></x-form-textarea>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Sizing">
        <x-slot:code_slot>
            @verbatim
<x-form-input class="input-size-lg-custom" type="text" placeholder="Large input"/>
<x-form-input type="text" placeholder="Default input"/>
<x-form-input class="input-size-sm-custom" type="text" placeholder="Small input"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input :class="theme_class('form_control_lg')" class="mb-3" type="text" placeholder="Large input" aria-label="Large input example"/>
        <x-form-input class="mb-3" type="text" placeholder="Default input" aria-label="Default input example"/>
        <x-form-input :class="theme_class('form_control_sm')" class="mb-3" type="text" placeholder="Small input" aria-label="Small input example"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Input States">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="text" placeholder="Disabled input" disabled/>
<x-form-input type="text" value="Disabled readonly input" disabled readonly/>
<x-form-input type="text" value="Readonly input" readonly/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input class="mb-3" type="text" placeholder="Disabled input" disabled/>
        <x-form-input class="mb-3" type="text" value="Disabled readonly input" disabled readonly/>
        <x-form-input type="text" value="Readonly input" readonly/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Help Text">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="password" id="inputPassword5" label="Password" autocomplete="new-password">
    @slot('help')
        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
    @endslot
</x-form-input>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form>
            <x-form-input type="password" id="inputPassword5" label="Password" autocomplete="new-password">
                @slot('help')
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                @endslot
            </x-form-input>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Plaintext Inputs">
        <x-slot:code_slot>
            @verbatim
<!-- Horizontal Plaintext -->
<x-form-input readonly class="plaintext-custom" label="Email" value="email@example.com" horizontal/>

<!-- Plaintext with password -->
<x-form-input readonly class="plaintext-custom" label="Email" value="email@example.com"/>
<x-form-input type="password" label="Password" placeholder="Password"/>
<x-form-submit>Confirm identity</x-form-submit>
            @endverbatim
        </x-slot:code_slot>
        <x-form-form>
            <x-form-input readonly :class="theme_class('form_control_plaintext')" class="mb-3" id="staticEmail" label="Email" value="email@example.com" horizontal autocomplete="username"/>
        </x-form-form>
        <x-form-form>
            <div class="{{ theme_class('wrapper_horizontal') }} align-items-center">
                <div class="mfc-demo-col-auto">
                    <x-form-input readonly :class="theme_class('form_control_plaintext')" label="Email" id="staticEmail2" value="email@example.com" :class-label="theme_class('hidden')" autocomplete="username"/>
                </div>
                <div class="mfc-demo-col-auto">
                    <x-form-input type="password" id="inputPassword7" label="Password" placeholder="Password" :class-label="theme_class('hidden')" autocomplete="new-password"/>
                </div>
                <div class="mfc-demo-col-auto">
                    <x-form-submit class="mb-3">Confirm identity</x-form-submit>
                </div>
            </div>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="File inputs">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="file" id="formFile" label="Default file input example"/>
<x-form-input type="file" id="formFileMultiple" multiple label="Multiple files input example"/>
<x-form-input type="file" id="formFileDisabled" disabled label="Disabled file input example"/>
<x-form-input class="file-input-size-sm-custom" type="file" label="Small file input example"/>
<x-form-input class="file-input-size-lg-custom" type="file" label="Large file input example"/>
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
            <x-form-input :class="theme_class('form_control_sm')" id="formFileSm" type="file" label="Small file input example"/>
        </div>
        <div class="mb-3">
            <x-form-input :class="theme_class('form_control_lg')" id="formFileLg" type="file" label="Large file input example"/>
        </div>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Others (Color, Datalist)">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="color" id="exampleColorInput" value="#563d7c" label="Color picker"/>
<x-form-input list="datalistOptions" id="exampleDataList" label="Datalist example"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input type="color" :class="theme_class('form_control_color')" id="exampleColorInput" value="#563d7c" label="Color picker" title="Choose your color"/>
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
        <div class="mfc-demo-grid">
            <div class="mfc-demo-col-md-6">
                <x-form-input type="text" label="Text" name="native_text" />
                <x-form-input type="password" label="Password" name="native_password" />
                <x-form-input type="email" label="Email" name="native_email" />
                <x-form-input type="number" label="Number" name="native_number" />
                <x-form-input type="tel" label="Tel" name="native_tel" />
                <x-form-input type="url" label="Url" name="native_url" />
                <x-form-input type="search" label="Search" name="native_search" />
            </div>
            <div class="mfc-demo-col-md-6">
                <x-form-input type="date" label="Date" name="native_date" />
                <x-form-input type="datetime-local" label="DateTime Local" name="native_datetime" />
                <x-form-input type="month" label="Month" name="native_month" />
                <x-form-input type="week" label="Week" name="native_week" />
                <x-form-input type="time" label="Time" name="native_time" />
                <x-form-input type="color" label="Color" name="native_color" :class="theme_class('form_control_color')" />
                <x-form-input type="range" label="Range" name="native_range" />
            </div>
        </div>
    </x-form::preview.components.example>
    <x-form::preview.components.example title="Multi-language Inputs">
        <p class="mb-3 small text-muted">The <code>language</code> attribute automatically handles array-based naming (e.g. <code>title[en]</code>).</p>
        <x-slot:code_slot>
            @verbatim
<x-form-input name="title" language="en" label="Title (English)" />
<x-form-input name="title" language="nl" label="Titel (Nederlands)" />
            @endverbatim
        </x-slot:code_slot>
        <x-form-input name="title" language="en" label="Title (English)" class="mb-3" />
        <x-form-input name="title" language="nl" label="Titel (Nederlands)" />
    </x-form::preview.components.example>
</x-form::preview.components.section>
