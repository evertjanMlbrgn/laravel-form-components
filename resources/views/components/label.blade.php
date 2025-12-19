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
    $containsFormControlLg = $horizontal && str_contains($attributes->get('parentClasses'), 'form-control-lg');
    $containsFormControlSm = $horizontal && str_contains($attributes->get('parentClasses'), 'form-control-sm');
    $isCheckboxOrRadio = (isset($type) && ($type === 'checkbox' || $type === 'radio'));
@endphp
{{--label has type {{ isset($type) ? $type : 'no type' }}--}}
{{--required {{ (bool) $required }}--}}
@if ($slot->isNotEmpty())
     <label {{ $attributes->class([
        'form-label' => !$horizontal && !$toggle && !$isCheckboxOrRadio,
        'col-form-label' => $horizontal && !$containsFormControlLg && !$containsFormControlSm,
        'required' => (bool) $required,
        'col-form-label-sm' => $horizontal && $containsFormControlSm,
        'col-form-label-lg' => $horizontal && $containsFormControlLg
    ])->except(['parentClasses']) }}>
        {{ $slot }}
    </label>
@endif
{{--@once--}}
{{--    <x-form-components::assets :config="$assetFeatures()" />--}}
{{--@endonce--}}
