<x-form-control-wrapper {{ $attributes->merge() }} :id="$getId()">
    <textarea
        {{ $attributes->class(['form-control html-editor', 'is-invalid' => $hasError($name) ]) }}
        name="{{ $name }}"
        id="{{ $getId() }}"

        {{-- Placeholder is required as of writing --}}
        @if($floating && !$attributes->get('placeholder'))
            placeholder="&nbsp;"
        @endif

    >
        {{ $value }}
    </textarea>

</x-form-control-wrapper>

@once
    @vite('resources/js/vendor/tinyMCE/tinyMCE.js')
@endonce