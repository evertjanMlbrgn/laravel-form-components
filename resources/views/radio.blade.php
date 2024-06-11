<x-form-control-wrapper class="form-check @if(null !== $attributes->get('inline')) form-check-inline @endif" :id="$getId()" >

    <input
        {{ $attributes->class([
            'form-check-input', 'is-invalid' => $hasError($name)
        ]) }}
        type="radio"
        value="{{ $value }}"
        name="{{ $name }}"
        id="{{ $getId() }}"
        @if($checked)
            checked="checked"
        @endif
    />

    @if($shouldShowError($name))
        <x-form-errors :name="$name" />
    @endif

</x-form-control-wrapper>
