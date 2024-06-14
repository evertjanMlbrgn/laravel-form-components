<x-form-form>
    <x-form-input name="input[nested]" />
    <x-form-textarea name="textarea[nested]" />
    <x-form-select name="select[nested]" :options="['c' => 'c', 'f' => 'f']" />
    <x-form-checkbox name="checkbox[nested]" />

    <x-form-radio name="radio[nested]" />

    <x-form-submit />
</x-form-form>
