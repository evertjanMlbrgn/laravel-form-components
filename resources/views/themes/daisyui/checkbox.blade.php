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

    @if($toggle)
        {{-- DaisyUI Toggle Button (toggle attribute in package -> button-like appearance) --}}
        <input
            {{ $attributes->class([
               theme_class('button_check'),
               theme_class('invalid_class') => $hasError($name)
           ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
            type="checkbox"
            value="{{ $value }}"
            @if($name) name="{{ $name }}" @endif
            id="{{ $id }}"
            @if($checked || old($name)) checked="checked" @endif
            @if((isset($help) || !empty($helpText) || $hasError($name)))
                aria-describedby="{{ trim(((isset($help) || !empty($helpText)) ? $id . '-help-text ' : '') . ($hasError($name) ? $id . '-error' : '')) }}"
            @endif
        >
        <x-mlbrgn-form-components::label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
                theme_class('button_toggle', theme_class('button')),
                $attributes->get('class-label', ''),
                $attributes->get('class-toggle-button', ''),
            ])
            :for="$id">
            {{ $label }}
            {{ $slot }}
        </x-mlbrgn-form-components::label>
    @elseif($label || $slot->isNotEmpty())
        <x-mlbrgn-form-components::label
            :required="$attributes->has('required')"
            :for="$id"
            :parentClasses="$attributes->get('class')"
            @class([
                theme_class('form_check_label'),
                $attributes->get('class-label'),
            ])
        >
            <span class="{{ theme_class('form_label') }}">
                {{ $label }}
                {{ $slot }}
            </span>
            @include('mlbrgn-form-components::themes.daisyui.partials.checkbox-input')
        </x-mlbrgn-form-components::label>
    @else
        @include('mlbrgn-form-components::themes.daisyui.partials.checkbox-input')
    @endif

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

    @if(!$toggle)
        </div>
    @endif
@endif
