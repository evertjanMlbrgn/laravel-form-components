<x-form-form id="form-validation-errors">
    <x-form-input name="input" />
    <x-form-textarea name="textarea" />
    <x-form-select name="select" :options="['' => '', 'c' => 'c']" />
    <x-form-checkbox name="checkbox" value="1" />
    <x-form-radio name="radio" />
    <x-form-submit />
</x-form-form>

<x-form-form id="form-no-validation-errors">
    <x-form-input :show-errors="false" name="input" />
    <x-form-textarea :show-errors="false" name="textarea" />
    <x-form-select :show-errors="false" name="select" />
    <x-form-checkbox :show-errors="false" name="checkbox" />
    <x-form-radio :show-errors="false" name="radio" />
    <x-form-submit />
</x-form-form>

<div id="form-validation-mode-fallback">
    <x-form-form >
        <x-form-input :show-errors="false" name="input" />
        <x-form-textarea :show-errors="false" name="textarea" />
        <x-form-select :show-errors="false" name="select" />
        <x-form-checkbox :show-errors="false" name="checkbox" />
        <x-form-radio :show-errors="false" name="radio" />
        <x-form-submit />
    </x-form-form>
</div>


