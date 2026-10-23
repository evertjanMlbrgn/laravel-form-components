@aware([
    'horizontal',
    'toggle',
    'type'
])

{{-- Don't want attribute required to be added to label, so using prop --}}
@props([
    'required' => false,
])

@php
    $containsFormControlLg = $horizontal && str_contains($attributes->get('parentClasses'), theme_class('form_control_lg'));
    $containsFormControlSm = $horizontal && str_contains($attributes->get('parentClasses'), theme_class('form_control_sm'));
    $isCheckboxOrRadio = (isset($type) && ($type === 'checkbox' || $type === 'radio'));
@endphp
{{--label has type {{ isset($type) ? $type : 'no type' }}--}}
{{--required {{ (bool) $required }}--}}
@if ($slot->isNotEmpty())
     <label {{ $attributes->class([
        theme_class('form_label') => !$horizontal && !$toggle && !$isCheckboxOrRadio,
        theme_class('form_check_label') => $isCheckboxOrRadio && !$toggle,
        theme_class('form_label_horizontal') => $horizontal && !$containsFormControlLg && !$containsFormControlSm,
        'required' => (bool) $required,
        theme_class('form_label_horizontal_sm') => $horizontal && $containsFormControlSm,
        theme_class('form_label_horizontal_lg') => $horizontal && $containsFormControlLg
    ])->except(['parentClasses']) }}>
        {{ $slot }}
    </label>
@endif
