{{-- Cache ID to avoid generating multiple times --}}
<?php $id = $getId(); ?>

@if(!$hidden)

    {{-- Wrapper for floating or horizontal controls, classes go on the wrapper, other attributes on control itself --}}
    @if($floating || $horizontal)
        <div
            {{ $attributes->onlyWrapperClasses()->class([
                'row' => $horizontal,
                'form-floating' => $floating,
//                'd-none' => $hidden
               ]) }}
        >
    @endif

    {{-- label before control --}}
    @if(!$attributes->has('label-end') && (!$floating || $horizontal))
        <x-mlbrgn-form-label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
                'col-4' => empty($classLabel),
                $classLabel
             ])
            :for="$id">
            {{ $label }}
        </x-mlbrgn-form-label>
    @endif

    {{-- horizontal control wrapper --}}
    @if($horizontal)
        <div
            @class([
                 'col-8' => empty($classControl),
                 $classControl => !empty($classControl)
             ])
        >
    @endif

@endif

        {{-- Textarea element --}}
        <textarea
        @if(!$floating && !$horizontal)
            {{ $attributes->class([
                'form-control',
                'is-invalid' => $hasError($name)
            ]) }}
        @else
            {{ $attributes->exceptWrapperClasses()->class([
               'form-control',
               'is-invalid' => $hasError($name)
           ]) }}
        @endif
        name="{{ $name }}"
        {{-- Placeholder is required as of writing --}}
        @if($floating && !$attributes->get('placeholder'))
            placeholder="&nbsp;"
        @endif
        @if(isset($help))
            aria-describedby="{{ $id }}-help-text"
        @endif
        @if ($hidden)
            hidden
        @endif
        id="{{ $id }}"
        >{{ $value ?? $slot }}</textarea>
        {{-- important there should be no space between > and < otherwise placeholder won't show !!!  --}}

@if(!$hidden)

    {{-- Feedback messages --}}
    @if(!empty($validFeedback))
        <div
            @class([
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

{{-- label after control --}}
    @if($attributes->has('label-end') || ($floating && !$horizontal))
        <x-mlbrgn-form-label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
               $classLabel
           ])
            :for="$id">
            {{ $label }}
        </x-mlbrgn-form-label>
    @endif

    {{-- Error message --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif

    {{-- Help text --}}
    @if(isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
    @endif

    {{-- close horizontal control wrapper --}}
    @if($horizontal)
        </div>
    @endif

    {{-- Close wrapper for floating or horizontal controls --}}
    @if($floating || $horizontal)
        </div>
    @endif
@endif
