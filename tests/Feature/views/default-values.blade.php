<x-form-form>
    <x-form-input default="a" name="input" />
    <x-form-textarea default="b" name="textarea" />
    <x-form-select default="c" name="select" :options="['' => '', 'c' => 'c']" />
    <x-form-checkbox :default="true" name="checkbox" />
    <x-form-radio :default="true" name="radio" />
</x-form-form>
