@aware([
    'horizontal',
    'toggle',
    'type',
    'withinInputGroup' => false,
])

{{-- Don't want attribute required to be added to label, so using prop --}}
@props([
    'required' => false,
    'horizontal' => false,
    'toggle' => false,
])

@php
    $isWithinInputGroup = $withinInputGroupProp ?? $withinInputGroup;

    $containsFormControlLg = $horizontal && str_contains($attributes->get('parentClasses'), theme_class('form_control_lg'));
    $containsFormControlSm = $horizontal && str_contains($attributes->get('parentClasses'), theme_class('form_control_sm'));
    $isCheckboxOrRadio = (isset($type) && ($type === 'checkbox' || $type === 'radio'));
@endphp
@if ($slot->isNotEmpty())
    @php
        $themeLabelClass = '';
        if ($isWithinInputGroup && config('form-components.modify_label_class')) {
            $themeLabelClass = theme_class('input_group_text');
        } elseif (!$horizontal && !$toggle && !$isCheckboxOrRadio) {
            $themeLabelClass = theme_class('form_label');
        } elseif ($isCheckboxOrRadio && !$toggle) {
            $themeLabelClass = theme_class('form_check_label');
        } elseif ($horizontal) {
            if ($containsFormControlSm) {
                $themeLabelClass = theme_class('form_label_horizontal_sm');
            } elseif ($containsFormControlLg) {
                $themeLabelClass = theme_class('form_label_horizontal_lg');
            } else {
                $themeLabelClass = theme_class('form_label_horizontal');
            }
        }

        // Avoid adding theme class tokens that are already present in passed classes.
        if ($themeLabelClass) {
            $existingClasses = preg_split('/\s+/', trim($attributes->get('class', '')), -1, PREG_SPLIT_NO_EMPTY);
            $themeLabelClasses = preg_split('/\s+/', trim($themeLabelClass), -1, PREG_SPLIT_NO_EMPTY);
            $themeLabelClass = implode(' ', array_diff($themeLabelClasses, $existingClasses));
        }
    @endphp
     <label {{ $attributes->class([
        $themeLabelClass,
        'required' => (bool) $required,
    ])->except(['parentClasses', 'withinInputGroupProp']) }}>
        {{ $slot }}
    </label>
@endif
