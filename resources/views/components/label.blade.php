@aware([
    'required',
    'horizontal',
    'toggle',
    'type'
])

@php
    $containsFormControlLg = $horizontal && str_contains($attributes->get('parentClasses'), 'form-control-lg');
    $containsFormControlSm = $horizontal && str_contains($attributes->get('parentClasses'), 'form-control-sm');
    $isCheckboxOrRadio = (isset($type) && ($type === 'checkbox' || $type === 'radio'));
@endphp
{{--label has type {{ isset($type) ? $type : 'no type' }}--}}
@if ($slot->isNotEmpty())
    <label {{ $attributes->class([
        'form-label' => !$horizontal && !$toggle && !$isCheckboxOrRadio,
        'col-form-label' => $horizontal && !$containsFormControlLg && !$containsFormControlSm,
        'required' => $required,
        'col-form-label-sm' => $horizontal && $containsFormControlSm,
        'col-form-label-lg' => $horizontal && $containsFormControlLg
    ]) }}>
        {{ $slot }}
    </label>
@endif
