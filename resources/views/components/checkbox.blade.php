{{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
<?php
    $id = $getId();
?>

@if(!$toggle && !$hidden)
    <div @class([
        'form-check',
        'form-switch' => $attributes->get('switch'),
        'form-check-inline' => $attributes->get('inline'),
        ])>
@endif

    <input
        {{ $attributes->class([
            'form-check-input' => !$toggle,
            'btn-check' => $toggle,
            'is-invalid' => $hasError($name)
        ]) }}
        type="checkbox"
        value="{{ $value }}"
        name="{{ $name }}"
        id="{{ $id }}"
        @if($checked)
            checked="checked"
        @endif
        @if(isset($help))
            aria-describedby="{{ $id }}-help-text"
        @endif
        @if(isset($hidden))
            hidden
        @endif
        >

    @if(!$hidden)
        <x-mlbrgn-form-label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
                'form-check-label' => !$toggle,
                'btn' => $toggle,
                $classButton,
                $classLabel
            ])
            :for="$id">
            {{ $label }}
        </x-mlbrgn-form-label>
    @endif


    @if(isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif

@if(!$toggle && !$hidden)
</div>
@endif

