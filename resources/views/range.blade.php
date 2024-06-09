<x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />

<input
    {!! $attributes->merge(['class' => 'form-range' . ($hasError($name) ? ' is-invalid' : '')]) !!}

    type="range"

    value="{{ $value }}"

    name="{{ $name }}"

    @if($label && !$attributes->get('id'))
        id="{{ $id() }}"
    @endif
/>

{!! $help ?? null !!}

@if($hasErrorAndShow($name))
    <x-form-errors :name="$name" />
@endif
