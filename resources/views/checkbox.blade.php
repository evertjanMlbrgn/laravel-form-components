<x-form-control-wrapper :id="$getId()" @class([
    'form-check',
    'form-switch' => $attributes->get('inline'),
    'form-check-inline' => $attributes->get('inline')
])>

    <input
        {!! $attributes->merge(['class' => 'form-check-input' . ($hasError($name) ? ' is-invalid' : '')]) !!}
        type="checkbox"
        value="{{ $value }}"
        name="{{ $name }}"
        @if($label)
            id="{{ $getId() }}"
        @endif
        @if($checked)
            checked="checked"
        @endif
    >

</x-form-control-wrapper>

