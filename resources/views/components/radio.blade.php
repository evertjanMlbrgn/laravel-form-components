{{-- Cache ID to avoid generating multiple times --}}
<?php $id = $getId(); ?>

@if(!$hidden)
    {{-- Open wrapper --}}
    @if(!$toggle)
    <div {{ $attributes->onlyWrapperClasses()->class([
        'form-check',
        'form-check-inline' => $attributes->get('inline'),
        ]) }}
    >
    @endif
@endif

    {{-- Input --}}
    <input
        @if(!$toggle && !$hidden)
            {{ $attributes->exceptWrapperClasses()->class([
                'form-check-input' => !$toggle,
                'btn-check' => $toggle,
                'is-invalid' => $hasError($name),
            ]) }}
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

    {{-- label --}}
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

    {{-- Feedback messages --}}
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

    {{-- Error message --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif

    {{-- Help text --}}
    @if(isset($help))
        test
        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
        test 2
        <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
    @endif

    {{-- Close wrapper --}}
    @if(!$toggle)
    </div>
    @endif
@endif

