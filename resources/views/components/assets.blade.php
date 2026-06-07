@php
    $nonce = mlbrgn_csp_nonce();
@endphp

@if(!empty($assetConfig))
    <script
        type="application/json"
        class="mlbrgn-form-components-config"
        @isset($nonce) nonce="{{ $nonce }}" @endisset
    >{!! json_encode([
        ...$assetConfig,
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endif

@once
    <script
        type="module"
        src="{{ asset(config('form-components.asset_path') . '/js/core/form-components-loader.js') }}"
        @isset($nonce) nonce="{{ $nonce }}" @endisset
    ></script>
@endonce

{{ $slot }}
