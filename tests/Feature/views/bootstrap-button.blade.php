<x-form-form id="form-1">
    <x-form-button id="button"/>
    <x-form-submit id="button-submit"/>
    <x-form-button id="button-reset" type="reset"/>
    <x-form-button id="button-2" type="button"/>
    <x-form-button id="button-submit-2" type="submit"/>
</x-form-form>

<x-form-form id="form-2">
    <x-form-button id="button-2" class-button="btn-my-button"/>
    <x-form-submit id="button-submit-2" class-button="btn-something"/>
    <x-form-button id="button-reset-2" type="reset" class-button="btn-something-else"/>
</x-form-form>

<x-form-form id="form-3">
    <x-form-button id="button-3" class="btn-sm" class-button="btn-my-button"/>
    <x-form-submit id="button-submit-3" class-button="btn-lg"/>
    <x-form-button id="button-reset-3" type="reset" class-button="btn-extra"/>
</x-form-form>

<x-form-form id="form-4">
    <x-form-button id="button-4" autofocus disabled/>
    <x-form-submit id="button-submit-4" formtarget="test" value="submit value"/>
    <x-form-button id="button-reset-4" formnovalidate formaction="test"/>
</x-form-form>

<x-form-form id="form-5">
    <x-form-button id="button-5">
        Button 5 label
    </x-form-button>
    <x-form-submit id="button-submit-5">
        Button submit 5 label
    </x-form-submit>
    <x-form-button type="reset" id="button-reset-5">
        Button reset 5 label
    </x-form-button>
</x-form-form>

<x-form-form id="form-6">
    <x-form-submit id="button-submit-6" type="button" />
</x-form-form>
