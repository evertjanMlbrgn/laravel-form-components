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
    id="{{ $id }}"
>
    {!! $attributes->has('label') ? $attributes->get('label') : (trim($slot) ?: 'Send') !!}
</button>
