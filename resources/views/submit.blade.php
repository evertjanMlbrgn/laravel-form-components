<button
    {{ $attributes->merge([
        'type' => 'submit'
    ])->class([
        'btn btn-update'
        ])
    }}
    >
    {{ trim($slot) ?: __('Submit') }}
</button>
