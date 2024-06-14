<x-form-form>
    <x-form-checkbox name="checkbox[]" value="a" label="Checkbox a" />
    <x-form-checkbox name="checkbox[]" value="b" label="Checkbox b" :default="old() ? false : true" />
    <x-form-submit />
</x-form-form>
