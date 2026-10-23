<div
    id="{{ $id }}"

    {{ $attributes->onlyWrapperClasses()->class([
    theme_class('group'),
    theme_class('invalid_class') => $hasError($name),
    'show-errors' => $showErrors,
    'required' => $attributes->has('required')
    ]) }}

    @if(isset($help) || !empty($helpText))
        aria-describedby="{{ $id }}-help-text"
    @endif
>
    <x-mlbrgn-form-components::label
        :required="$attributes->has('required')"
{{--        @class([--}}
{{--            'col-4' => empty($attributes->get('class-label', '')),--}}
{{--            $attributes->get('class-label', '')--}}
{{--         ])--}}
{{--        :for="$id">--}}
    >{{ $label }}</x-mlbrgn-form-components::label>

{{--    @if(config('form-components.detect_validation_classes_in_group'))--}}
{{--        @php--}}
{{--            // Modify the slot content if it has a label or labels add class input-group-text--}}
{{--            $isValidated = Str::contains(trim($slot), ['is-invalid', 'is-valid']);--}}
{{--        @endphp--}}
{{--        detected {{ $isValidated ? 'Yes' : 'No' }}--}}
{{--    @endif--}}

{{--    <div @class([--}}
{{--        'd-flex flex-row flex-wrap inline-space' => $inline,--}}
{{--        'show-errors' => $showErrors,--}}
{{--        'required' => $attributes->has('required')--}}
{{--    ])>{{ $slot }}</div>--}}

    @if($inline)
    <div
        {{ $attributes->exceptWrapperClasses()->only('class')->class([theme_class('group_inline_wrapper'), $attributes->get('class-inline-wrapper', '')]) }}
    >{{ $slot }}</div>
    @else
        {{ $slot }}
    @endif

    {{-- Client side feedback messages --}}
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

    {{-- server side feedback messages --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-components::errors :name="$name" />
    @endif
</div>
