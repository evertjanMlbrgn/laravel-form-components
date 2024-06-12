@props([
    'hidden' => false,
    'required' => false,
    'floating' => false,
    'horizontal' => false,
])

{{--<samp>--}}
{{--    <p> inside input</p>--}}
{{--    <p>--}}
{{--        name {{ $name }}--}}
{{--        hidden {{ $hidden ? 'yes' : 'no' }},--}}
{{--        required {{ $required ? 'yes' : 'no'}},--}}
{{--        floating {{ $floating ? 'yes' : 'no' }}--}}
{{--        horizontal {{ $horizontal ? 'yes' : 'no' }}--}}
{{--        errors {{ $errors ?? $errors }}--}}
{{--    </p>--}}
{{--</samp>--}}

<x-form-control-wrapper :id="$getId()" >
        <input
            {{ $attributes->class([
            'form-control',
            'form-control-color' => ($type === 'color'),
            'is-invalid' => ($hasError($name))
            ]) }}
            type="{{ $type }}"
            value="{{ $value ?? ($type === 'color' ? '#000000' : '') }}"
            name="{{ $name }}"
            id="{{ $getId() }}"
            {{-- floating labels won't work without placeholder, yet they never display placeholder either --}}
            @if($floating && !$attributes->has('placeholder'))
                    placeholder="&nbsp;"
            @endif
            {{-- don't understand why placeholder is automatically added to this input when not floating label --}}
        >

</x-form-control-wrapper>

