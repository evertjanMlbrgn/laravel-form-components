@once
    @php($nonce = mlbrgn_csp_nonce())
    {{-- CSP-safe JSON config for JS loader --}}
    <script type="application/json"
            id="mlbrgn-asset-config"
            @isset($nonce) nonce="{{ $nonce }}" @endisset
        >
        @json($assetConfig)
    </script>

    {{-- Load the public asset loader (handles all features: validation, html-editor, etc.) --}}
    <script type="module"
            src="{{ asset('vendor/mlbrgn/laravel-form-components/js/asset-loader.js') }}"
            @isset($nonce) nonce="{{ $nonce }}" @endisset
    >
    </script>
@endonce

{{-- Optional slot for additional content, e.g., inline initialization --}}
{{ $slot }}
