@props([
    'type' => 'button'
])
<button
    {{ $attributes->merge([
        'type' => $type
    ])->class([
        'btn btn-update'
        ])
    }}
    @if(isset($name))
        name="{{ $name }}"
    @endif
>
    {{ trim($slot) ?: 'Send' }}
</button>
