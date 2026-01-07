@once
    {{-- CSP-safe JSON config for JS loader --}}
    <script type="application/json" id="mlbrgn-asset-config">
        @json($config)
    </script>

    {{-- Load the public asset loader (handles all features: validation, html-editor, etc.) --}}
    <script type="module"
            src="{{ asset('vendor/mlbrgn/laravel-form-components/js/asset-loader.js') }}">
    </script>
@endonce

{{-- Optional slot for additional content, e.g., inline initialization --}}
{{ $slot }}
