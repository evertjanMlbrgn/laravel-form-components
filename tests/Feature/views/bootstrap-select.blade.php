<x-form-form id="form-1">
    <x-form-select name="select">
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
    </x-form-select>

    <x-form-submit />
</x-form-form>

<x-form-form id="form-2">
    <x-form-select name="select" placeholder="Choose..." :options="['a' => 'a', 'b' => 'b']"></x-form-select>
    <x-form-submit />
</x-form-form>


<x-form-form id="form-3">
    <x-form-select id="hidden-select" name="select" value="select-value" label="hidden-select-label" hidden>
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>
    <x-form-select id="non-hidden-select" name="select" value="select-value" label="noon-hidden-select-label">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>
    <x-form-submit />
</x-form-form>

<x-form-form id="form-4">
    <x-form-select id="select" name="select" label="select" class="mx-3 my-3 ms-3 mt-3 me-3 mb-3 form-control-lg some-other-class" horizontal>
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>
</x-form-form>

<x-form-form id="form-5">
    @bind(['select' => '0'])
    <x-form-select name="select" :options="['1' => 'Yes', '0' => 'No']" />
    @endbind
    <x-form-submit />
</x-form-form>

<x-form-form id="form-default">
    <x-form-select default="c" name="select" :options="['' => '', 'c' => 'c']" />
</x-form-form>

<x-form-form id="form-select-without-keys">
    <x-form-select name="select" :options="['a', 'b', 'c']" />
    <x-form-submit />
</x-form-form>
