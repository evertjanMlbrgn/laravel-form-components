<button

    {{ $attributes->merge([
        'type' => $type ?? 'button'
    ])->class([
        'btn',
        'd-none' => $hidden,
        ])->except([
            'required',
            'readonly',
            'help-text',
            'id'])
            ->whereDoesntStartWith('class-')
    }}
    @if(!empty($name))
        name="{{ $name }}"
    @endempty
    @if($hidden)
        hidden
    @endif
    @if((isset($help) || !empty($helpText)) && !$hidden)
        aria-describedby="{{ $id }}-help-text"
    @endif
    id="{{ $id }}"
>
    {!! filled($attributes->get('label')) ? $attributes->get('label') :
       (isset($value) ? $value :
       (trim($slot) ?: 'Send')) !!}
</button>

@if(!$hidden)
    {{-- Help text --}}
    @isset($help)
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
        >{{ $helpText }}
        </x-mlbrgn-form-components::text>
    @endif
@endif
