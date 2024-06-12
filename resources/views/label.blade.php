@aware([
    'required'
])
@if ($slot->isNotEmpty())
    <label {{ $attributes->class([
        'form-label',
        'required' => $required
    ]) }}>
        {{ $slot }}
    </label>
@endif
