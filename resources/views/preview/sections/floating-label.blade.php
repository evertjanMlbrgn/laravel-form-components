<x-form::preview.components.section id="form-floating-label" title="Floating labels" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/floating-labels/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Basic example">
        <x-slot:code_slot>
            @verbatim
<x-form-input floating id="floatingInput" label="Email address" placeholder="name@example.com"/>
<x-form-input floating id="floatingPassword" label="Password" type="password" placeholder="Password"/>
<x-form-input floating id="floatingInputValue" label="Input with value" placeholder="name@example.com" value="test@example.com"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input floating id="floatingInput" label="Email address" placeholder="name@example.com" class="mb-3"/>
        <x-form-input floating id="floatingPassword" label="Password" type="password" placeholder="Password" class="mb-3"/>
        <x-form-input floating id="floatingInputValue" label="Input with value" placeholder="name@example.com" value="test@example.com"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Validation styles">
        <x-slot:code_slot>
            @verbatim
<x-form-input floating class="is-invalid" id="floatingInputInvalid" label="Invalid input" placeholder="name@example.com" value="test@example.com"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input floating class="is-invalid" id="floatingInputInvalid" label="Invalid input" placeholder="name@example.com" value="test@example.com"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Textareas">
        <x-slot:code_slot>
            @verbatim
<x-form-textarea floating id="floatingTextarea" label="Comments" placeholder="Leave a comment here"></x-form-textarea>
<x-form-textarea floating id="floatingTextarea2" label="Comments" placeholder="Leave a comment here" style="height: 100px"></x-form-textarea>
            @endverbatim
        </x-slot:code_slot>
        <x-form-textarea floating id="floatingTextarea" label="Comments" placeholder="Leave a comment here" class="mb-3"></x-form-textarea>
        <x-form-textarea floating id="floatingTextarea2" label="Comments" placeholder="Leave a comment here" style="height: 100px"></x-form-textarea>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Selects">
        <x-slot:code_slot>
            @verbatim
<x-form-select floating id="floatingSelect" label="Works with selects" :options="$selectOptions" placeholder="Open this select menu"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-select floating id="floatingSelect" label="Works with selects" :options="$selectOptions" placeholder="Open this select menu"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Layout">
        <x-slot:code_slot>
            @verbatim
<div class="row g-2">
    <div class="col-md">
        <x-form-input floating id="floatingInputGrid" label="Email address" placeholder="name@example.com" value="mdo@example.com"/>
    </div>
    <div class="col-md">
        <x-form-select floating id="floatingSelectGrid" label="Works with selects" :options="$selectOptions" placeholder="Open this select menu"/>
    </div>
</div>
            @endverbatim
        </x-slot:code_slot>
        <div class="row g-2">
            <div class="col-md">
                <x-form-input floating id="floatingInputGrid" label="Email address" placeholder="name@example.com" value="mdo@example.com"/>
            </div>
            <div class="col-md">
                <x-form-select floating id="floatingSelectGrid" label="Works with selects" :options="$selectOptions" placeholder="Open this select menu"/>
            </div>
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
