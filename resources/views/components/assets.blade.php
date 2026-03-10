@once
    @php($nonce = mlbrgn_csp_nonce())
    {{-- CSP-safe JSON config for JS loader --}}
    <script type="application/json"
            id="mlbrgn-asset-config"
            @if($nonce) nonce="{{ $nonce }}" @endif
        >
        @json($config)
    </script>

    {{-- Load the public asset loader (handles all features: validation, html-editor, etc.) --}}
    <script type="module"
            src="{{ asset('vendor/mlbrgn/laravel-form-components/js/asset-loader.js') }}"
            @if($nonce) nonce="{{ $nonce }}" @endif
    >
    </script>
@endonce

{{-- Optional slot for additional content, e.g., inline initialization --}}
{{ $slot }}
