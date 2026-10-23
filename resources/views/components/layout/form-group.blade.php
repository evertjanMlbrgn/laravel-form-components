@aware(['withinInputGroup' => false])
@php
    $wrapperAttributes = $attributes->onlyWrapperClasses();
    $useGroupWrapper = theme_class('use_group_wrapper', false) && !$withinInputGroup;
    $hasWrapperClasses = !empty($wrapperAttributes->get('class'));
@endphp
@if($floating || $horizontal || $hasWrapperClasses || $useGroupWrapper)
    <div
        {{ $wrapperAttributes->class([
            theme_class('wrapper_horizontal') => $horizontal,
            theme_class('wrapper_floating') => $floating,
            theme_class('field', theme_class('group')) => $useGroupWrapper,
        ]) }}
    >
        {{ $slot }}
    </div>
@else
    {{ $slot }}
@endif
