@aware([
    'required',
    'horizontal',
    'toggle'
])

@php
    $containsFormControlLg = $horizontal && str_contains($attributes->get('parentClasses'), 'form-control-lg');
    $containsFormControlSm = $horizontal && str_contains($attributes->get('parentClasses'), 'form-control-sm');
@endphp

@if ($slot->isNotEmpty())
    <label {{ $attributes->class([
        'form-label' => !$horizontal && !$toggle, // TODO not needed for checkbox and radio
        'col-form-label' => $horizontal && !$containsFormControlLg && !$containsFormControlSm,
        'required' => $required,
        'col-form-label-sm' => $horizontal && $containsFormControlSm,
        'col-form-label-lg' => $horizontal && $containsFormControlLg
    ]) }}>
        {{ $slot }}
    </label>
@endif
