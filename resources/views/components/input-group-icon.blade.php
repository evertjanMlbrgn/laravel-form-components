<x-mlbrgn-form-input-group @class([
    $attributes->get('class')
])>
{{--    <svg class="bi" width="32" height="32" fill="currentColor">--}}
{{--        <use xlink:href="bootstrap-icons.svg#heart-fill"/>--}}
{{--    </svg>--}}
    @if(!$attributes->has('icon-position') || $attributes->get('icon-position') === 'start')

        {{-- font icon --}}
        @if($attributes->has('class-font-icon'))
            <span @class(['input-group-text', 'input-group-icon'])>
                <i @class([$attributes->get('class-font-icon')])></i>
            </span>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <span @class(['input-group-text', 'input-group-icon'])>
                {{ $iconSvg }}
            </span>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <span @class(['input-group-text', 'input-group-icon'])>
                {{ $iconImg }}
            </span>
        @endif

        @if($attributes->has('svg-sprite-href'))
            <span class="input-group-text">
                <svg class="svg-icon" width="16" height="16">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </span>
        @endif
    @endif
    {{ $slot }}

    {{-- font icon --}}
    @if($attributes->get('icon-position') === 'end')

        @if($attributes->has('class-font-icon'))
            <span @class(['input-group-text', 'input-group-icon'])>
                <i @class([$attributes->get('class-font-icon')])></i>
            </span>
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            <span @class(['input-group-text', 'input-group-icon'])>
                {{ $iconSvg }}
            </span>
        @endif

        {{-- img icon --}}
        @isset($iconImg)
            <span @class(['input-group-text', 'input-group-icon'])>
                {{ $iconImg }}
            </span>
        @endif

        {{-- svg sprite --}}
        @if($attributes->has('svg-sprite-href'))
            <span class="input-group-text">
                <svg class="svg-icon" width="16" height="16">
                    <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                </svg>
            </span>
        @endif
    @endif

</x-mlbrgn-form-input-group>
