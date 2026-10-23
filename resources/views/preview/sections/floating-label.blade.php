<x-form::preview.components.section id="form-floating-label" title="Floating labels" description="Examples taken from <a href='https://getbootstrap.com/docs/5.3/forms/floating-labels/' target='_blank'>Bootstrap documentation on form controls</a>. Adjusted to use our form-components.">
    <x-form::preview.components.example title="Basic example">
        <x-slot:code_slot>
            @verbatim
<x-form-input floating id="floatingInput" label="Email address" placeholder="name@example.com"/>
<x-form-input floating id="floatingPassword" label="Password" type="password" placeholder="Password"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input floating id="floatingInput" label="Email address" placeholder="name@example.com"/>
        <x-form-input floating id="floatingPassword" label="Password" type="password" placeholder="Password"/>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Textareas">
        <x-slot:code_slot>
            @verbatim
<x-form-textarea floating id="floatingTextarea2" label="Comments" placeholder="Leave a comment here" style="height: 100px"></x-form-textarea>
            @endverbatim
        </x-slot:code_slot>
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
</x-form::preview.components.section>
