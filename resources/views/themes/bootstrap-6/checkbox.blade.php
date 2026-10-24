@if(!$hidden)
    @if(!$toggle)
        <div {{ $attributes->onlyWrapperClasses()->class([
            theme_class('form_check'),
            theme_class('form_check_inline') => $attributes->get('inline'),
           ]) }}
        >
    @endif

    @if($defaultToZero)
        <input type="hidden" name="{{ $name }}" value="0">
    @endif

    @php
        $isSwitch = $attributes->get('switch');
        $inputClass = $isSwitch ? theme_class('form_check_switch', 'switch') : theme_class('form_check_input', 'check');
        if ($toggle) {
            $inputClass = theme_class('button_check', 'btn-check');
        }

        $invalidClass = theme_class('invalid_class', 'is-invalid');
    @endphp

    @if($isSwitch && !$toggle)
        <div @class([
            $inputClass,
            // Add theme classes if they are present in attributes
            // Bootstrap 6 often puts the theme on the switch wrapper
            collect(explode(' ', $attributes->get('class', '')))->filter(fn($c) => str_starts_with($c, 'theme-'))->implode(' ')
        ])>
    @endif

    {{-- Input --}}
    <input
        @if(!$toggle)
            {{ $attributes->exceptWrapperClasses()->class([
               $inputClass => !$isSwitch,
               $invalidClass => $hasError($name),
           ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
        @else
            {{ $attributes->class([
               $inputClass,
               $invalidClass => $hasError($name)
           ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
        @endif
        type="checkbox"
        value="{{ $value }}"
        @if($name)
        name="{{ $name }}"
        @endif
        id="{{ $id }}"
        @if($isSwitch)
            role="switch"
        @endif
        @if($checked || old($name))
            checked="checked"
        @endif
        @if((isset($help) || !empty($helpText) || $hasError($name)) && !$hidden)
            aria-describedby="{{ trim(((isset($help) || !empty($helpText)) ? $id . '-help-text ' : '') . ($hasError($name) ? $id . '-error' : '')) }}"
        @endif
        >

    @if($isSwitch && !$toggle)
        </div>
    @endif

    {{-- label --}}
    <x-mlbrgn-form-components::label
        :parentClasses="$attributes->get('class')"
        :required="$attributes->has('required')"
        @class([
            theme_class('form_check_label') => !$toggle,
            theme_class('button_toggle', theme_class('button')) => $toggle,
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
                        theme_class('valid_tooltip') => $tooltipFeedback,
                    ])>
                {{ $validFeedback }}
            </div>
        @endif

        @if(!empty($invalidFeedback))
            <div @class([
                        theme_class('invalid_feedback') => !$tooltipFeedback,
                        theme_class('invalid_tooltip') => $tooltipFeedback,
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
