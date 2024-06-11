@aware([
    'required'
])
@if ($slot->isNotEmpty())
    <label {{ $attributes->class([
        'form-label',
        'required' => $attributes->has('required')
    ]) }}>
        {{ $slot }}
    </label>
@endif
