<button
    {{ $attributes->merge([
        'type' => $type ?? 'button'
    ])->class([
        'btn',
        'd-none' => $hidden,
        $classButton
        ])->except(['required', 'readonly', 'label'])
    }}
    @if(!empty($name))
        name="{{ $name }}"
    @endempty
    @if($hidden)
        hidden
    @endif
    id="{{ $getId() }}"
>
    {!! trim($slot) ?: 'Send' !!}
</button>
