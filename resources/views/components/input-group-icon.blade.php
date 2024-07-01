<x-mlbrgn-form-input-group @class([
    $attributes->get('class')
])>

    @if(!$attributes->has('icon-position') || $attributes->get('icon-position') === 'start')

        {{-- font icon --}}
        @if($attributes->has('class-font-icon'))
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])>
                <i @class([$attributes->get('class-font-icon')])></i>
            </span>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])>
                {{ $iconSvg }}
            </span>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])>
                {{ $iconImg }}
            </span>
        @endif

        @if($attributes->has('svg-sprite-href'))
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])>
                <svg class="svg-icon">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </span>
        @endif
    @endif
    {{ $slot }}

    {{-- font icon --}}
    @if($attributes->get('icon-position') === 'end')

        @if($attributes->has('class-font-icon'))
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])>
                <i @class([$attributes->get('class-font-icon')])></i>
            </span>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])>
                {{ $iconSvg }}
            </span>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])>
                {{ $iconImg }}
            </span>
        @endif

        {{-- svg sprite --}}
        @if($attributes->has('svg-sprite-href'))
            <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])>
                <svg class="svg-icon">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </span>
        @endif
    @endif

</x-mlbrgn-form-input-group>
