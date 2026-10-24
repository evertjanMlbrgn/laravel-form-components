<x-form::preview.components.section id="form-floating-label" title="Floating labels" description="Floating labels provide a modern and interactive way to display labels inside form inputs." support="floating_labels">
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
<x-form-input floating class="invalid-custom" id="floatingInputInvalid" label="Invalid input" placeholder="name@example.com" value="test@example.com"/>
            @endverbatim
        </x-slot:code_slot>
        <x-form-input floating :class="theme_class('invalid_class')" id="floatingInputInvalid" label="Invalid input" placeholder="name@example.com" value="test@example.com"/>
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
<x-form-input floating id="floatingInputGrid" label="Email address" placeholder="name@example.com" value="mdo@example.com"/>
<x-form-select floating id="floatingSelectGrid" label="Works with selects" :options="$selectOptions" placeholder="Open this select menu"/>
            @endverbatim
        </x-slot:code_slot>
        <div class="mfc-demo-grid">
            <div class="mfc-demo-col">
                <x-form-input floating id="floatingInputGrid" label="Email address" placeholder="name@example.com" value="mdo@example.com"/>
            </div>
            <div class="mfc-demo-col">
                <x-form-select floating id="floatingSelectGrid" label="Works with selects" :options="$selectOptions" placeholder="Open this select menu"/>
            </div>
        </div>
    </x-form::preview.components.example>
</x-form::preview.components.section>
