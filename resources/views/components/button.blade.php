<button

    {{ $attributes->merge([
        'type' => $type ?? 'button'
    ])->class([
        'btn',
        'd-none' => $hidden,
//        'btn-primary' => !$attributes->has('class-button'),
//        $attributes->get('class-button', '')
        ])->except(['required', 'readonly', 'label', 'help-text', 'id'])->whereDoesntStartWith('class-')
    }}
    @if(!empty($name))
        name="{{ $name }}"
    @endempty
    @if($hidden)
        hidden
    @endif
    id="{{ $getId() }}"
>
    {!! $attributes->has('label') ? $attributes->get('label') : (trim($slot) ?: 'Send') !!}
</button>
