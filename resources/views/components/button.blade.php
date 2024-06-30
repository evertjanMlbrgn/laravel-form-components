<button

    {{ $attributes->merge([
        'type' => $type ?? 'button'
    ])->class([
        'btn',
        'd-none' => $hidden,
        ])->except(['required', 'readonly', 'label', 'help-text', 'id'])->whereDoesntStartWith('class-')
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
    {!! $attributes->has('label') ? $attributes->get('label') : (trim($slot) ?: 'Send') !!}
</button>

@if(!$hidden)
    {{-- Help text --}}
    @isset($help)
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $helpText }}</x-mlbrgn-form-text>
    @endif
@endif
