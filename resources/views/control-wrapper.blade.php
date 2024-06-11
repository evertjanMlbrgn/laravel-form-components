@aware([
    'name',
    'help',
    'hidden',
    'floating',
    'label',
    'required',
    'horizontal'
])
@props([
'id'
])

{{--<samp>--}}
{{--    <p> inside control wrapper</p>--}}
{{--    <p>--}}
{{--        name {{ $name }},--}}
{{--        hidden {{ $hidden ? 'yes' : 'no' }},--}}
{{--        required {{ $required ? 'yes' : 'no'}},--}}
{{--        floating {{ $floating ? 'yes' : 'no' }}--}}
{{--        horizontal {{ $horizontal ? 'yes' : 'no' }}--}}
{{--        errors {{ $errors ?? $errors }}--}}
{{--    </p>--}}
{{--</samp>--}}

<div {{ $attributes->class(['form-control-wrapper', 'form-floating' => $floating, 'd-none' => $hidden]) }}>
    @if(!$floating)
        <x-form-label :for="$id" :required="$attributes->has('required')">{{ $label }}</x-form-label>
    @endif
    {{ $slot }}

    @if($floating)
            <x-form-label :for="$id" :required="$attributes->has('required')">{{ $label }}</x-form-label>
    @endif

    {!! $help ?? null !!}
{{--    <x-errors/>--}}
{{--        @if($shouldShowError($name))--}}
{{--            <x-form-errors :name="$name" />--}}
{{--        @endif--}}
        @error($name, $bag = 'default')
        <div {!! $attributes->merge(['class' => 'invalid-feedback']) !!}>
            {{ $message }}
        </div>
        @enderror
</div>
