<x-mlbrgn-form-input-group @class([
    $attributes->get('class')
])>

    @if(!$attributes->has('icon-position') || $attributes->get('icon-position') === 'start')

        {{-- font icon --}}
        @if($attributes->has('class-font-icon'))
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])
            @if($attributes->has('for'))
                for="{{ $attributes->get('for') }}"
            @endif
            >
                <i @class([$attributes->get('class-font-icon')])></i>
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])
                @if($attributes->has('for'))
                   for="{{ $attributes->get('for') }}"
                @endif
            >
                {{ $iconSvg }}
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])
            @if($attributes->has('for'))
                for="{{ $attributes->get('for') }}"
            @endif
            >
                {{ $iconImg }}
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif

        @if($attributes->has('svg-sprite-href'))
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])
                @if($attributes->has('for'))
                   for="{{ $attributes->get('for') }}"
                @endif
            >
                <svg class="svg-icon">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif
    @endif
    {{ $slot }}

    {{-- font icon --}}
    @if($attributes->get('icon-position') === 'end')

        @if($attributes->has('class-font-icon'))
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])
                @if($attributes->has('for'))
                   for="{{ $attributes->get('for') }}"
                @endif
            >
                <i @class([$attributes->get('class-font-icon')])></i>
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])
                @if($attributes->has('for'))
                    for="{{ $attributes->get('for') }}"
                @endif
            >
                {{ $iconSvg }}
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])
                @if($attributes->has('for'))
                    for="{{ $attributes->get('for') }}"
                @endif
            >
                {{ $iconImg }}
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif

        {{-- svg sprite --}}
        @if($attributes->has('svg-sprite-href'))
            <{{ $attributes->has('for') ? 'label' : 'span' }}
                @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])
                @if($attributes->has('for'))
                    for="{{ $attributes->get('for') }}"
                @endif
            >
                <svg class="svg-icon">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </{{ $attributes->has('for') ? 'label' : 'span' }}>
        @endif
    @endif

</x-mlbrgn-form-input-group>
