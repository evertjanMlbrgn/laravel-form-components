<x-form-control-wrapper :id="$getId()" class="form-check @if(null !== $attributes->get('switch')) form-switch @endif @if(null !== $attributes->get('inline')) form-check-inline @endif">

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

