{{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
<?php
    $id = $getId();
?>

@if($floating || $horizontal)
    <div @class(['row' => $horizontal, 'form-floating' => $floating, 'd-none' => $hidden])  >
@endif

    @if(!$hidden && (!$floating || $horizontal))
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

    @if($horizontal)
        <div
            @class([
                 'col-8' => empty($classControl),
                 $classControl => !empty($classControl)
             ])
        >
    @endif

        <textarea
        {{  $attributes->class([
        'form-control',
        'is-invalid' => $hasError($name)
        ]) }}
        name="{{ $name }}"
{{--        @if($required) required @endif--}}
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
        id="{{ $id }}">{{ $value }}</textarea>
        {{-- important there should be no space between > and < otherwise placeholder won't show !!!  --}}

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
    @if($horizontal)
        </div>
    @endif

    @if(!$hidden && ($floating && !$horizontal))
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

    @if(isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif

@if($floating || $horizontal)
    </div>
@endif
