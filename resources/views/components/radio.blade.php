{{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
<?php
    $id = $getId();
?>

@if(!$toggle)
<div @class([
    'form-check',
    'form-check-inline' => $attributes->get('inline'),
    ])>
@endif

    <input
        {{ $attributes->class([
            'form-check-input' => !$toggle,
            'btn-check' => $toggle,
            'is-invalid' => $hasError($name),
            'test-class'
        ]) }}
        type="radio"
        value="{{ $value }}"
        name="{{ $name }}"
        id="{{ $id }}"
        @if($checked)
            checked="checked"
        @endif
        @if(isset($help))
            aria-describedby="{{ $id }}-help-text"
        @endif
    />

    <x-form-label :parentClasses="$attributes->get('class')"
        @class([
        'form-check-label' => !$toggle,
        'btn' => $toggle,
        $classButton,
        $classLabel
        ])
        :for="$id"
        :required="$attributes->has('required')"
        >
        {{ $label }}
    </x-form-label>

    @if(isset($help))
        <x-form-text :id="$id">{{ $help }}</x-form-text>
    @endif

    @if($shouldShowError($name))
        <x-form-errors :name="$name" />
    @endif

@if(!$toggle)
</div>
@endif
