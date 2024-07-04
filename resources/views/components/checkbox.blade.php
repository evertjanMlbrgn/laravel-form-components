{{-- Open wrapper --}}
@if(!$hidden)
    @if(!$toggle)
        <div {{ $attributes->onlyWrapperClasses()->class([
            'form-check',
            'form-switch' => $attributes->get('switch'),
            'form-check-inline' => $attributes->get('inline'),
           ]) }}
        >
    @endif
@endif

    @if($attributes->has('default-to-zero'))
        {{-- Hidden input to handle unchecked state --}}
        <input type="hidden" name="{{ $name }}" value="0">
    @endif

    {{-- Input --}}
    <input
        @if(!$toggle && !$hidden)
            {{ $attributes->exceptWrapperClasses()->class([
               'form-check-input' => !$toggle,
               'btn-check' => $toggle,
               'is-invalid' => $hasError($name)
           ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
        @else
            {{ $attributes->class([
               'form-check-input' => !$toggle,
               'btn-check' => $toggle,
               'is-invalid' => $hasError($name)
           ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
        @endif
        type="checkbox"
        value="{{ $value ?? '' }}"
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
    <x-mlbrgn-form-label
        :parentClasses="$attributes->get('class')"
        :required="$attributes->has('required')"
        @class([
            'form-check-label' => !$toggle,
            'btn' => $toggle,
            $attributes->get('class-label', ''),
            $attributes->get('class-toggle-button', '') => $toggle,
        ])
        :for="$id">
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

