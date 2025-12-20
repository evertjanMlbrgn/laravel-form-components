<x-form-form id="button-help-text-slot">
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
