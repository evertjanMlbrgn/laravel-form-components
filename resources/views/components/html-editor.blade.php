{{-- Cache ID to avoid generating multiple times --}}
<?php $id = $getId(); ?>

{{-- Wrapper for floating, hidden or horizontal controls, classes go on the wrapper, other attributes on control itself --}}
@if($floating || $hidden || $horizontal)
<div
    {{ $attributes->onlyWrapperClasses()->class([
        'row' => $horizontal,
        'form-floating' => $floating,
        'd-none' => $hidden
   ]) }}
>
@endif

    {{-- label before control --}}
    @if(!$hidden)
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

        {{-- Textarea element --}}
        <textarea
            @if(!$floating && !$horizontal)
                {{ $attributes->class([
                    'form-control',
                    'html-editor',
                    'is-invalid' => $hasError($name)
                ]) }}
            @else
                {{ $attributes->exceptWrapperClasses()->class([
                    'form-control',
                    'html-editor',
                    'is-invalid' => $hasError($name)
                ]) }}
            @endif
            name="{{ $name }}"
            id="{{ $id }}"

            {{-- Placeholder is required as of writing --}}
            @if($floating && !$attributes->get('placeholder'))
                placeholder="&nbsp;"
            @endif
            @if(isset($help))
                aria-describedby="{{ $id }}-help-text"
            @endif
        >{{ $slot }}</textarea>
        {{-- important there should be no space between > and < otherwise placeholder won't show !!!  --}}

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
        @if(!$hidden)
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
        @endif

        {{-- Error message --}}
        @if($shouldShowError($name))
            <x-mlbrgn-form-errors :name="$name" />
        @endif

        {{-- Help text --}}
        @if(isset($help))
            <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
        @endif

        @if(isset($helpText) && !isset($help))
            <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
        @endif

    {{-- close horizontal control wrapper --}}
    @if($horizontal)
        </div>
    @endif

{{-- Close wrapper for floating, hidden or horizontal controls --}}
@if($floating || $hidden || $horizontal)
    </div>
@endif

@once
    <script src="{{ package_asset('html-editor.js') }}"></script>
@endonce
