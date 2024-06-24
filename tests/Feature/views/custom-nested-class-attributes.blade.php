<x-form-form>
    <x-form-input id="input" readonly class="form-control-plaintext mb-3"  label="Email" value="email@example.com"
                  horizontal class-label="col-2" class-control="col-10" autocomplete="username"/>
    <x-form-input id="password" type="password" class="mb-3" label="Password" horizontal class-label="col-3"
                  class-control="col-9" autocomplete="new-password"/>
    <x-form-button id="button" class-button="btn-secondary">Button</x-form-button>
    {{-- toggle check and radio --}}
    <x-form-checkbox id="checkbox-toggle" checked autocomplete="off" label="Checked checkbox" class-button="btn-outline-secondary" toggle/>
    <x-form-radio id="radio-toggle" autocomplete="off" checked label="Checked radio" class-button="btn-outline-success" toggle/>
</x-form-form>
