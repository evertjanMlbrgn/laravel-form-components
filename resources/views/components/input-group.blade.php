@aware([
    'validationMode',
    ]
)

{{-- Open wrapper--}}
<div
    {{ $attributes->onlyWrapperClasses()->class([theme_class('hidden') => $hidden ])->except(['required', 'for']) }}
>

    @isset($label)
        <x-mlbrgn-form-components::label :required="$attributes->has('required')" :for="$attributes->get('for')" :withinInputGroupProp="false">
            {{  $label }}
        </x-mlbrgn-form-components::label>
    @endisset

     <div
         {{ $attributes->exceptWrapperClasses()->class([
            theme_class('input_group'),
            theme_class('input_group_has_validation') => $validationMode === 'client-default' || $validationMode === 'client-custom',// needs to be added for rounded border when validation messages show
            theme_class('invalid_class') => $hasError($name)
           ])->except(['required', 'for']) }}
         @if(isset($help) || !empty($helpText) && !$hidden)
             aria-describedby="{{ $id }}-help-text"
         @endif
    >

        @if (isset($slot1) && $slot1 != null)
            {{ $slot1 }}
        @endif
        @if (isset($slot2) && $slot2 != null)
            {{ $slot2 }}
        @endif
        @if (isset($slot3) && $slot3 != null)
            {{ $slot3 }}
        @endif
        @if (isset($slot4) && $slot4 != null)
            {{ $slot4 }}
        @endif
        @if (isset($slot5) && $slot5 != null)
            {{ $slot5 }}
        @endif

        {{ $slot }}
    </div>

    {{-- Error message --}}
{{--    @if($shouldShowError($name))--}}
{{--        <x-mlbrgn-form-components::errors :name="$name" />--}}
{{--    @endif--}}

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

{{-- Open wrapper--}}
</div>
