<button
    {{ $attributes->merge([
        'type' => $type
    ])->class([
        'btn',
        $classButton
        ])
    }}
    @if(isset($name))
        name="{{ $name }}"
    @endif
>
    {{ trim($slot) ?: 'Send' }}
</button>
