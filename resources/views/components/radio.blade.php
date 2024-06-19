{{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
<?php
    $id = $getId();
?>

@if(!$toggle && !$hidden)
    <div {{ $attributes->class([
        'form-check',
        'form-check-inline' => $attributes->get('inline'),
        ])->filter(fn (string $value, string $key) => $key === 'class') }}
    >
@endif

    <input
        @if(!$toggle && !$hidden)
            {{ $attributes->filter(fn (string $value, string $key) => $key !== 'class') }}
            @class([
                'form-check-input' => !$toggle,
                'btn-check' => $toggle,
                'is-invalid' => $hasError($name),
            ])
        @else
            {{ $attributes->class([
                'form-check-input' => !$toggle,
                'btn-check' => $toggle,
                'is-invalid' => $hasError($name),
            ]) }}
        @endif
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
        @if($hidden)
            hidden
        @endif
    />

    @if(!$hidden)
        <x-mlbrgn-form-label :parentClasses="$attributes->get('class')"
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
        </x-mlbrgn-form-label>
    @endif

    @if(!empty($validFeedback))
        <div @class([
                'valid-feedback' => !$tooltipFeedback,
                'valid-tooltip' => $tooltipFeedback,
            ])>
            {{ $validFeedback }}
        </div>
    @endif

    @if(!empty($invalidFeedback))
        <div @class([
                'invalid-feedback' => !$tooltipFeedback,
                'invalid-tooltip' => $tooltipFeedback,
            ])>
            {{ $invalidFeedback }}
        </div>
    @endif

    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif

    @if(isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(isset($helpText) && !isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
    @endif

@if(!$toggle && !$hidden)
</div>
@endif
