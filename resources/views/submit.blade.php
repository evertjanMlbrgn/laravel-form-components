<button
    {!! $attributes->merge([
        'class' => 'btn btn-update',
        'type' => 'submit'
    ]) !!}
>
    {!! trim($slot) ?: __('Submit') !!}
</button>
