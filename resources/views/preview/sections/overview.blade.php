<x-form::preview.components.section id="form-overview" title="Overview" description="This section provides an overview of common form components and their basic usage.">
    <x-form-form>
        <x-form::preview.components.example>
            <x-slot:code_slot>
                @verbatim
<x-form-input id="exampleInputEmail1" label="Email address" autocomplete="username">
    @slot("help")
        We will never share your email with anyone else.
    @endslot
</x-form-input>

<x-form-input type="password" id="exampleInputPassword" label="Password" autocomplete="new-password"/>

<x-form-checkbox id="exampleCheck1" label="Check me out"/>

<x-form-submit>Submit</x-form-submit>
                @endverbatim
            </x-slot:code_slot>

            <x-form-input id="exampleInputEmail1" label="Email address" autocomplete="username">
                @slot('help')
                    We'll never share your email with anyone else.
                @endslot
            </x-form-input>

            <x-form-input type="password" id="exampleInputPassword" label="Password" autocomplete="new-password"/>

            <x-form-checkbox id="exampleCheck1" label="Check me out"/>

            <x-form-submit>Submit</x-form-submit>
        </x-form::preview.components.example>
    </x-form-form>

    <x-form::preview.components.example title="Form text">
        <x-slot:code_slot>
            @verbatim
<x-form-input type="password" id="inputPassword1" label="Password" autocomplete="new-password">
    @slot("help")
        Your password must be 8-20 characters long...
    @endslot
</x-form-input>
            @endverbatim
        </x-slot:code_slot>

        <x-form-form>
            <x-form-input id="inputUsername" hidden autocomplete="username"/>
            <x-form-input type="password" id="inputPassword1" label="Password" autocomplete="new-password">
                @slot('help')
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                @endslot
            </x-form-input>
            <x-form-input type="password" id="inputPassword2" label="Password with help text containing html" autocomplete="new-password">
                @slot('help')
                    Your <strong>password</strong> must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                @endslot
            </x-form-input>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Disabled forms">
        <x-slot:code_slot>
            @verbatim
<fieldset disabled>
    <x-form-input id="disabledTextInput" placeholder="Disabled input" label="Disabled input"/>
    <x-form-select id="disabledSelect" label="Disabled select menu">
        <option>Disabled select</option>
    </x-form-select>
    <x-form-checkbox id="disabledFieldsetCheck" disabled label="Can't check this"/>
    <x-form-submit>Submit</x-form-submit>
</fieldset>
            @endverbatim
        </x-slot:code_slot>

        <x-form-form>
            <fieldset disabled>
                <legend>Disabled fieldset example</legend>
                <x-form-input id="disabledTextInput" placeholder="Disabled input" label="Disabled input"/>
                <x-form-select id="disabledSelect" label="Disabled select menu">
                    <option>Disabled select</option>
                    @slot('help')
                        Just to <strong>see</strong> if help text appears and has id and is referred to by aria-describedby.
                    @endslot
                </x-form-select>
                <x-form-checkbox id="disabledFieldsetCheck" disabled label="Can't check this"/>
                <x-form-submit>Submit</x-form-submit>
            </fieldset>
        </x-form-form>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Inline text">
        <x-slot:code_slot>
            @verbatim
<x-form-form>
    <div>
        <x-form-label horizontal>Password</x-form-label>
        <x-form-input type="password" id="inputPassword4" autocomplete="new-password"/>
        <x-form-text>
            Must be 8-20 characters long.
        </x-form-text>
    </div>
</x-form-form>
            @endverbatim
        </x-slot:code_slot>

        <x-form-form>
            <div class="mfc-demo-grid align-items-center">
                <div class="mfc-demo-col-auto">
                    <x-form-label horizontal>Password</x-form-label>
                </div>
                <div class="mfc-demo-col-auto">
                    <x-form-input type="password" id="inputPassword4" autocomplete="new-password"/>
                </div>
                <div class="mfc-demo-col-auto">
                    <x-form-text>
                        Must be 8-20 characters long.
                    </x-form-text>
                </div>
            </div>
        </x-form-form>
    </x-form::preview.components.example>
</x-form::preview.components.section>
