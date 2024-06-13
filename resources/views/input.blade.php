<x-form-control-wrapper :parentClasses="$attributes->get('class')" :id="$getId()" >
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
        >
</x-form-control-wrapper>

