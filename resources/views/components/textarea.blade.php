@if($floating || $hidden || $horizontal)
    <div @class(['row' => $horizontal, 'form-floating' => $floating, 'd-none' => $hidden])  >
@endif

    @if(!$floating || $horizontal)
        <x-form-label
            :parentClasses="$attributes->get('class')"
            @class([
                'col-4' => empty($classLabel),
                $classLabel
             ])
            :for="$getId()">
            {{ $label }}
        </x-form-label>
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
        @if($required) required @endif
        {{-- Placeholder is required as of writing --}}
        @if($floating && !$attributes->get('placeholder'))
            placeholder="&nbsp;"
        @endif
        @if(isset($help))
            aria-describedby="{{ $getId() }}-help-text"
        @endif
        id="{{ $getId() }}">{{ $value }}</textarea>
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

    @if($floating && !$horizontal)
        <x-form-label
            :parentClasses="$attributes->get('class')"
            @class([
               $classLabel
           ])
            :for="$getId()">
            {{ $label }}
        </x-form-label>
    @endif

    @if(isset($help))
        <x-form-text :id="$getId()">{{ $help }}</x-form-text>
    @endif

    @if($shouldShowError($name))
        <x-form-errors :name="$name" />
    @endif

@if($floating || $hidden || $horizontal)
    </div>
@endif
