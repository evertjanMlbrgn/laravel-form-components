@php
    $useInputWrapper = $horizontal || theme_class('use_input_wrapper', false);
@endphp
@if($useInputWrapper)
    <div
        {{ $attributes->onlyWrapperClasses()->class([
            theme_class('wrapper_horizontal_control') => $horizontal && empty($attributes->get('class-horizontal-cols-control', '')),
            $attributes->get('class-horizontal-cols-control', '') => $horizontal && !empty($attributes->get('class-horizontal-cols-control', '')),
            theme_class('input_wrapper') => theme_class('use_input_wrapper', false)
        ]) }}
    >
        {{ $slot }}
    </div>
@else
    {{ $slot }}
@endif
