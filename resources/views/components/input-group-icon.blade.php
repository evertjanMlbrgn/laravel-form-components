<x-mlbrgn-form-input-group @class([
    $attributes->get('class')
])>

    @if(!$attributes->has('icon-position') || $attributes->get('icon-position') === 'start')

        {{-- font icon --}}
        @if($attributes->has('class-font-icon'))
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])
            @if($attributes->has('for'))
                for="{{ $attributes->get('for') }}"
            @endif
            >
                <i @class([$attributes->get('class-font-icon')])></i>
            </label>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])
                @if($attributes->has('for'))
                   for="{{ $attributes->get('for') }}"
                @endif
            >
                {{ $iconSvg }}
            </label>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])
            @if($attributes->has('for'))
                for="{{ $attributes->get('for') }}"
            @endif
            >
                {{ $iconImg }}
            </label>
        @endif

        @if($attributes->has('svg-sprite-href'))
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])
                @if($attributes->has('for'))
                   for="{{ $attributes->get('for') }}"
                @endif
            >
                <svg class="svg-icon">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </label>
        @endif
    @endif
    {{ $slot }}

    {{-- font icon --}}
    @if($attributes->get('icon-position') === 'end')

        @if($attributes->has('class-font-icon'))
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])
                @if($attributes->has('for'))
                   for="{{ $attributes->get('for') }}"
                @endif
            >
                <i @class([$attributes->get('class-font-icon')])></i>
            </label>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])
                @if($attributes->has('for'))
                    for="{{ $attributes->get('for') }}"
                @endif
            >
                {{ $iconSvg }}
            </label>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])
                @if($attributes->has('for'))
                    for="{{ $attributes->get('for') }}"
                @endif
            >
                {{ $iconImg }}
            </label>
        @endif

        {{-- svg sprite --}}
        @if($attributes->has('svg-sprite-href'))
            <label @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])
                @if($attributes->has('for'))
                    for="{{ $attributes->get('for') }}"
                @endif
            >
                <svg class="svg-icon">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </label>
        @endif
    @endif

</x-mlbrgn-form-input-group>
