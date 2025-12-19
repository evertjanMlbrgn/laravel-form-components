<x-mlbrgn-form-components::input-group
    @class([$attributes->get('class')])
>

    {{-- ICONS AT START --}}
    @if (!$attributes->has('icon-position') || $attributes->get('icon-position') === 'start')

        {{-- font icon --}}
        @if ($attributes->has('class-font-icon'))
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])
                >
                    <i @class([$attributes->get('class-font-icon')])></i>
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])>
                    <i @class([$attributes->get('class-font-icon')])></i>
                </span>
            @endif
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])
                >
                    {{ $iconSvg }}
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])>
                    {{ $iconSvg }}
                </span>
            @endif
        @endisset

        {{-- img icon --}}
        @isset($iconImg)
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])
                >
                    {{ $iconImg }}
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])>
                    {{ $iconImg }}
                </span>
            @endif
        @endisset

        {{-- svg sprite --}}
        @if ($attributes->has('svg-sprite-href'))
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])
                >
                    <svg class="svg-icon">
                        <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                    </svg>
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])>
                    <svg class="svg-icon">
                        <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                    </svg>
                </span>
            @endif
        @endif

    @endif

    {{-- input --}}
    {{ $slot }}

    {{-- ICONS AT END --}}
    @if ($attributes->get('icon-position') === 'end')

        {{-- font icon --}}
        @if ($attributes->has('class-font-icon'))
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])
                >
                    <i @class([$attributes->get('class-font-icon')])></i>
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-font'])>
                    <i @class([$attributes->get('class-font-icon')])></i>
                </span>
            @endif
        @endif

        {{-- svg icon --}}
        @isset($iconSvg)
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])
                >
                    {{ $iconSvg }}
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-svg'])>
                    {{ $iconSvg }}
                </span>
            @endif
        @endisset

        {{-- img icon --}}
        @isset($iconImg)
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])
                >
                    {{ $iconImg }}
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-img'])>
                    {{ $iconImg }}
                </span>
            @endif
        @endisset

        {{-- svg sprite --}}
        @if ($attributes->has('svg-sprite-href'))
            @if ($attributes->has('for'))
                <label
                    for="{{ $attributes->get('for') }}"
                    @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])
                >
                    <svg class="svg-icon">
                        <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                    </svg>
                </label>
            @else
                <span @class(['input-group-text', 'input-group-icon', 'input-group-icon-sprite'])>
                    <svg class="svg-icon">
                        <use href="{{ $attributes->get('svg-sprite-href') }}"></use>
                    </svg>
                </span>
            @endif
        @endif

    @endif

</x-mlbrgn-form-components::input-group>

{{--@once--}}
{{--    <x-form-components::assets :config="$assetFeatures()" />--}}
{{--@endonce--}}
