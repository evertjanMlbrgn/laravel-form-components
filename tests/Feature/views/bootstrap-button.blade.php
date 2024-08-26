<x-form-form id="form-default-to-correct-type">
    <x-form-button id="button"/>
    <x-form-submit id="button-submit"/>
    <x-form-button id="button-reset" type="reset"/>
    <x-form-button id="button-2" type="button"/>
    <x-form-button id="button-submit-2" type="submit"/>
</x-form-form>

<x-form-form id="form-classes">
    <x-form-button id="button" class="btn-my-button"/>
    <x-form-submit id="button-submit" class="btn-something"/>
    <x-form-button id="button-reset" type="reset" class="btn-something-else"/>
</x-form-form>

<x-form-form id="form-extra-classes">
    <x-form-button id="button" class="btn-sm btn-my-button"/>
    <x-form-submit id="button-submit" class="btn-lg"/>
    <x-form-button id="button-reset" type="reset" class="btn-extra"/>
</x-form-form>

<x-form-form id="form-extra-attributes">
    <x-form-button id="button" autofocus disabled/>
    <x-form-submit id="button-submit" formtarget="test" value="submit value"/>
    <x-form-button id="button-reset" formnovalidate formaction="test"/>
</x-form-form>

<x-form-form id="form-label-as-slot">
    <x-form-button id="button">
        Button 5 label
    </x-form-button>
    <x-form-submit id="button-submit">
        Button submit 5 label
    </x-form-submit>
    <x-form-button type="reset" id="button-reset">
        Button reset 5 label
    </x-form-button>
</x-form-form>

<x-form-form id="form-label-as-attribute">
    <x-form-button id="button" label="overruled">
        label
    </x-form-button>
    <x-form-submit id="button-submit" label="overruled">
        submit label
    </x-form-submit>
    <x-form-button type="reset" id="button-reset" label="overruled">
        reset label
    </x-form-button>
</x-form-form>

<x-form-form id="form-no-type-override">
    <x-form-submit id="button-submit" type="button" />
</x-form-form>

<x-form-form id="form-help-text-using-attribute">
    <x-form-button id="button" help-text="help text using attribute">
        label
    </x-form-button>
    <x-form-submit id="button-submit" help-text="help text using attribute">
        submit label
    </x-form-submit>
    <x-form-button type="reset" id="button-reset" help-text="help text using attribute">
        reset label
    </x-form-button>
</x-form-form>

<x-form-form id="form-help-text-using-slot">
    <x-form-button id="button" help-text="help text using attribute">
        label
        @slot('help')
            help text using slot
        @endslot
    </x-form-button>
    <x-form-submit id="button-submit" help-text="help text using attribute">
        submit label
        @slot('help')
            help text using slot
        @endslot
    </x-form-submit>
    <x-form-button type="reset" id="button-reset" help-text="help text using attribute">
        reset label
        @slot('help')
            help text using slot
        @endslot
    </x-form-button>
</x-form-form>
