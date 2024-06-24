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

    <div @class([
        'd-flex flex-row flex-wrap inline-space' => $inline
    ])>
        {{ $slot }}
    </div>

    {{-- Help text --}}
    @isset($help)
        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
    @endif

    {{-- Error message --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif
</div>
