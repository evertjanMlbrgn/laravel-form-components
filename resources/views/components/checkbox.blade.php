@if(!$hidden)
    @if(!$toggle)
        <div {{ $attributes->onlyWrapperClasses()->class([
            theme_class('form_check'),
            theme_class('form_check_switch') => $attributes->get('switch'),
            theme_class('form_check_inline') => $attributes->get('inline'),
           ]) }}
        >
    @endif

    @if($defaultToZero)
        <input type="hidden" name="{{ $name }}" value="0">
    @endif

    {{-- Input --}}
    <input
        @if(!$toggle)
            {{ $attributes->exceptWrapperClasses()->class([
               theme_class('form_check_input') => !$toggle,
               theme_class('button_check') => $toggle,
               theme_class('invalid_class') => $hasError($name)
           ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
        @else
            {{ $attributes->class([
               theme_class('form_check_input') => !$toggle,
               theme_class('button_check') => $toggle,
               theme_class('invalid_class') => $hasError($name)
           ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
        @endif
        type="checkbox"
        {{--  value cannot be empty, Empty-string is worse than missing — it breaks comparisons.--}}
        value="{{ $value }}"
        @if($name)
        name="{{ $name }}"
        @endif
        id="{{ $id }}"
        @if($checked)
            checked="checked"
        @endif
        @if((isset($help) || !empty($helpText) || $hasError($name)) && !$hidden)
            aria-describedby="{{ trim(((isset($help) || !empty($helpText)) ? $id . '-help-text ' : '') . ($hasError($name) ? $id . '-error' : '')) }}"
        @endif
        @if(old($name))
            checked
        @endif
        >

    {{-- label --}}
    <x-mlbrgn-form-components::label
        :parentClasses="$attributes->get('class')"
        :required="$attributes->has('required')"
        @class([
            theme_class('form_check_label') => !$toggle,
            theme_class('button') => $toggle,
            $attributes->get('class-label', ''),
            $attributes->get('class-toggle-button', '') => $toggle,
        ])
        :for="$id">
        {{ $label }}
        {{ $slot }}
    </x-mlbrgn-form-components::label>

    {{-- client side feedback messages --}}
    @if($showErrors)
        @if(!empty($validFeedback))
            <div @class([
                        theme_class('valid_feedback') => !$tooltipFeedback,
                        theme_class('valid_tooltip', 'valid-tooltip') => $tooltipFeedback,
                    ])>
                {{ $validFeedback }}
            </div>
        @endif

        @if(!empty($invalidFeedback))
            <div @class([
                        theme_class('invalid_feedback') => !$tooltipFeedback,
                        theme_class('invalid_tooltip', 'invalid-tooltip') => $tooltipFeedback,
                    ])>
                {{ $invalidFeedback }}
            </div>
        @endif
    @endif

    {{-- server side feedback messages --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-components::errors :name="$name" :id="$id . '-error'" />
    @endif

    {{-- Help text --}}
    @if(isset($help))
        <x-mlbrgn-form-components::text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $help }}</x-mlbrgn-form-components::text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-components::text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $helpText }}</x-mlbrgn-form-components::text>
    @endif

    {{-- Close wrapper --}}
    @if(!$toggle)
    </div>
    @endif
@endif
