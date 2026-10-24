@props(['title' => null, 'code' => null, 'support' => null, 'id' => null])
<div @if($id) id="{{ $id }}" @endif class="mfc-shell-card mb-4 shadow-sm">
    <div class="mfc-shell-card-body">
        @if($title)
            <h3 class="mfc-shell-card-title h5">{{ $title }}</h3>
        @endif

        @if($support && !\Mlbrgn\LaravelFormComponents\Theme\Theme::supports($support))
            <div class="mfc-shell-alert mfc-shell-alert-warning mb-3" role="note" style="padding: 0.75rem; font-size: 0.875rem;">
                <i class="bi bi-exclamation-triangle-fill me-2" aria-hidden="true"></i>
                <strong>Note:</strong> This example uses features not natively supported by <strong>{{ \Mlbrgn\LaravelFormComponents\Theme\Theme::frameworkName() }}</strong>.
            </div>
        @endif

        <div class="preview-example-render">
            {{ $slot }}
        </div>

        @if($code || isset($code_slot))
            <div class="preview-example-code-wrapper bg-light p-3 border-top mt-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <small class="text-muted text-uppercase fw-bold">Blade Source</small>
                    <button class="mfc-shell-btn mfc-shell-btn-sm mfc-shell-btn-outline-secondary copy-code" onclick="copyToClipboard(this)">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                </div>
                <div class="mfc-preview-example-code">
                    <pre><code class="language-blade">{{ trim($code ?? $code_slot) }}</code></pre>
                </div>
            </div>
        @endif
    </div>
</div>
