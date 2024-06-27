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
            ])->whereDoesntStartWith('class-')->except(['inline', 'id']) }}
        @else
            {{ $attributes->class([
                'form-check-input' => !$toggle,
                'btn-check' => $toggle,
                'is-invalid' => $hasError($name),
            ])->whereDoesntStartWith('class-')->except(['inline', 'id']) }}
        @endif
        type="radio"
        value="{{ $value }}"
        @if($name)
            name="{{ $name }}"
        @endif
        id="{{ $id }}"
        @if($checked)
            checked="checked"
        @endif
        @if(isset($help) && !$hidden)
            aria-describedby="{{ $id }}-help-text"
        @endif
        @if($hidden)
            hidden
        @endif
    >

@if(!$hidden)

    {{-- label --}}
    <x-mlbrgn-form-label :parentClasses="$attributes->get('class')"
        @class([
            'form-check-label' => !$toggle,
            'btn' => $toggle,
            $attributes->get('class-label', ''),
            $attributes->get('class-toggle-button', '') => $toggle
        ])
        :for="$id"
        :required="$attributes->has('required')"
        >
        {{ $label }}
    </x-mlbrgn-form-label>

    {{-- client side feedback messages --}}
    @if($showErrors)
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
    @endif

    {{-- server side feedback messages --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif

    {{-- Help text --}}
    @if(isset($help))
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $helpText }}</x-mlbrgn-form-text>
    @endif

    {{-- Close wrapper --}}
    @if(!$toggle)
    </div>
    @endif
@endif

