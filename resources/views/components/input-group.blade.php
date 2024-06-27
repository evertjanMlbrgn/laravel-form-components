@aware([
    'usesValidation',
    'usesCustomValidation'
    ]
)

{{-- Open wrapper--}}
<div
    {{ $attributes->onlyWrapperClasses()->class(['d-none' => $hidden ])->except(['required', 'for']) }}
>

    @isset($label)
        <x-mlbrgn-form-label :required="$attributes->has('required')" :for="$attributes->get('for')">
            {{  $label }}
        </x-mlbrgn-form-label>
    @endif

     <div
         {{ $attributes->exceptWrapperClasses()->class([
            'input-group',
            'has-validation' => $usesCustomValidation || $usesValidation,// needs to be added for rounded border when validation messages show
            'is-invalid' => ($hasError($name) ? ' is-invalid' : '')
           ])->except(['required', 'for']) }}
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

        @if(config('form-components.modify_label_class'))
            @php
                // Modify the slot content if it has a label or labels add class input-group-text
                $slotContent = Str::replace('form-label', 'input-group-text', trim($slot));
            @endphp
            {!! $slotContent !!}
        @else
            {{ $slot }}
        @endif
    </div>

    {{-- Error message --}}
{{--    @if($shouldShowError($name))--}}
{{--        <x-mlbrgn-form-errors :name="$name" />--}}
{{--    @endif--}}

    {{-- Help text --}}
    @isset($help)
{{--        <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>--}}
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
{{--        <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>--}}
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $helpText }}</x-mlbrgn-form-text>
    @endif

{{-- Open wrapper--}}
</div>
