<div {{ $attributes->class([
    'form-group',
    'is-invalid' => $hasError($name)
    ]) }}
>

    <x-mlbrgn-form-label
        :required="$attributes->has('required')"
{{--        @class([--}}
{{--            'col-4' => empty($classLabel),--}}
{{--            $classLabel--}}
{{--         ])--}}
{{--        :for="$id">--}}
    >{{ $label }}</x-mlbrgn-form-label>

{{--    @if(config('form-components.detect_validation_classes_in_group'))--}}
{{--        @php--}}
{{--            // Modify the slot content if it has a label or labels add class input-group-text--}}
{{--            $isValidated = Str::contains(trim($slot), ['is-invalid', 'is-valid']);--}}
{{--        @endphp--}}
{{--        detected {{ $isValidated ? 'Yes' : 'No' }}--}}
{{--    @endif--}}

    <div @class([
        'd-flex flex-row flex-wrap inline-space' => $inline,
        'show-errors' => $showErrors
    ])>{{ $slot }}</div>

    {{-- Client side feedback messages --}}
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

    {{-- Help text --}}
    @isset($help)
        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
    @endif

    {{-- server side feedback messages --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif
</div>
