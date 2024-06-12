<x-form-control-wrapper :id="$getId()">

    <input
        {{ $attributes->class([
            'form-range', 'is-invalid' => $hasError($name)
            ]) }}
        type="range"
        value="{{ $value }}"
        name="{{ $name }}"
        @if($label)
            id="{{ $getId() }}"
        @endif
    />

</x-form-control-wrapper>
