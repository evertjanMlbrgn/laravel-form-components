@props(['title' => null, 'code' => null])
<div class="{{ theme_class('preview_example') }}">
    <div class="{{ theme_class('preview_example_body') }}">
        @if($title)
            <h3 class="{{ theme_class('preview_example_title') }}">{{ $title }}</h3>
        @endif

        <div class="preview-example-render">
            {{ $slot }}
        </div>

        @if($code || isset($code_slot))
            <div class="{{ theme_class('preview_example_code') }}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <small class="text-muted text-uppercase fw-bold">Blade Source</small>
                    <button class="btn btn-sm btn-outline-secondary copy-code" onclick="copyToClipboard(this)">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                </div>
                <pre><code class="language-blade">{{ trim($code ?? $code_slot) }}</code></pre>
            </div>
        @endif
    </div>
</div>
