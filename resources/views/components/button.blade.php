<button
    {{ $attributes->merge([
        'type' => $type
    ])->class([
        'btn',
        $classButton
        ])->filter(fn (string $value, string $key) => !in_array($key, ['required', 'readonly', 'label']))
    }}
    @if(isset($name))
        name="{{ $name }}"
    @endif
    id="{{ $getId() }}"
>
    {{ trim($slot) ?: 'Send' }}
</button>
