{{-- NOTE: type="file|button|reset|submit|image" inputs do not have support value / setting value --}}

{{-- Handle different input types, by using the right component --}}
@if(in_array($type, ['button', 'reset', 'submit']))
    <x-dynamic-component
        :component="'form-button'"
        :name="$name"
        :type="$type"
        :id="$id"
        :hidden="$hidden"
        :help-text="$helpText"
        :label="$label"
        :attributes="$attributes"
        :value="$value"
        :hidden="$hidden"
    >
        @isset($help)
            <x-slot name="help">
                {{ $help }}
            </x-slot>
        @endisset
        {{ $slot }}
    </x-dynamic-component>

@elseif(in_array($type, ['checkbox', 'radio']))
    <x-dynamic-component
        :component="'form-' . $type"
        :name="$name"
        :toggle="$attributes->has('toggle')"
        :checked="$attributes->has('checked')"
        :help-text="$helpText"
        :value="$value"
        :label="$label"
        :attributes="$attributes"
        :hidden="$hidden"
    >
        @isset($help)
            <x-slot name="help">
                {{ $help }}
            </x-slot>
        @endisset
    </x-dynamic-component>
@else

    {{-- Wrapper for floating or horizontal controls, classes go on the wrapper, other attributes on control itself --}}
    <x-mlbrgn-form-components::layout.form-group :name="$name" :horizontal="$horizontal" :floating="$floating" :showErrors="$showErrors" :attributes="$attributes">

    {{-- label before control --}}
    @if(!$hidden && $type !== 'hidden')
        @if(!$attributes->has('label-end') && (!$floating || $horizontal))
            <x-mlbrgn-form-components::label
                :parentClasses="$attributes->get('class')"
                :required="$attributes->has('required') && $type !== 'range'"
                @class([
                    $attributes->get('class-label', ''),
                    theme_class('wrapper_horizontal_label') => $horizontal && empty($attributes->get('class-horizontal-cols-label', '')),
                    $attributes->get('class-horizontal-cols-label', '')
                ])
                :for="$id">
                {{ $label }}
            </x-mlbrgn-form-components::label>
        @endif
    @endif

    {{-- horizontal control wrapper --}}
    <x-mlbrgn-form-components::layout.form-input-wrapper :horizontal="$horizontal" :attributes="$attributes">

            {{-- Input element --}}
            <input
                {{ $attributes->exceptWrapperClasses()->class([
                    theme_class('form_control') => $type !== 'range' && $type !== 'image',
                    theme_class('form_range') => $type === 'range',
                    theme_class('form_control_color') => ($type === 'color'),
                    theme_class('invalid_class') => ($hasError($name)),
                ])->whereDoesntStartWith('class-')->except(['label-end', 'id', 'alt']) }}
                type="{{ $type }}"
                @if(!in_array($type, ['file', 'image']))
                    value="{{ $value ?? ($type === 'color' ? '#000000' : '') }}"
                @endif
                @if($name)
                    name="{{ $name }}"
                @endif
                id="{{ $id }}"
                @if ($hidden)
                    hidden
                @endif
                @if($type === 'image')
                    {{-- image button must have alt attribute --}}
                    alt="{{ $attributes->get('alt', '&nbsp;') }}"
                @endif
                @if((isset($help) || !empty($helpText) || $hasError($name)) && !$hidden && $type !== 'hidden')
                    aria-describedby="{{ trim(((isset($help) || !empty($helpText)) ? $id . '-help-text ' : '') . ($hasError($name) ? $id . '-error' : '')) }}"
                @endif
                {{-- floating labels won't work without placeholder, yet they never display placeholder either --}}
                @if($floating && !$attributes->has('placeholder')) placeholder="&nbsp;"@endif
            >

        {{-- client side feedback messages --}}
        @if($showErrors)
                {{-- Feedback messages --}}
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

        {{-- label after control --}}
        @if(!$hidden && $type !== 'hidden' && ($attributes->has('label-end') || ($floating && !$horizontal)))
            <x-mlbrgn-form-components::label
                :parentClasses="$attributes->get('class')"
                :required="$attributes->has('required')"
                @class([
                   $attributes->get('class-label', '')
               ])
                :for="$id">
                {{ $label }}
            </x-mlbrgn-form-components::label>
        @endif

    {{-- close horizontal control wrapper --}}
    @if(!$hidden && $type !== 'hidden')

        {{-- server side feedback messages --}}
        @if($shouldShowError($name))
            <x-mlbrgn-form-components::errors :name="$name" :id="$id . '-error'" />
        @endif

        {{-- Help text --}}
        @isset($help)
            <x-mlbrgn-form-components::text
                :id="$id"
                @class([
                    $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
                ])
            >{{ $help }}</x-mlbrgn-form-components::text>
        @endisset

        @if(!empty($helpText) && !isset($help))
            <x-mlbrgn-form-components::text
                :id="$id"
                @class([
                    $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
                ])
            >{{ $helpText }}</x-mlbrgn-form-components::text>
        @endif
    @endif

    </x-mlbrgn-form-components::layout.form-input-wrapper>

    {{-- Close wrapper for floating or horizontal controls --}}
    </x-mlbrgn-form-components::layout.form-group>
@endif
