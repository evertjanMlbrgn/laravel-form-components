<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Components Preview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    @php
        $framework = theme_framework();
        $themes = array_keys(config('form-components.themes'));
    @endphp

    @if(in_array($framework, ['bootstrap-5', 'bootstrap-6']))
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    @elseif($framework === 'tailwind')
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    @elseif($framework === 'daisyui')
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
    <style>
        .preview-sidebar {
            height: calc(100vh - 2rem);
            overflow-y: auto;
        }
        pre { margin: 0; }
        .copy-code i { pointer-events: none; }

        /* Minimal Preview styling for Plain theme */
        .mfc-preview-body { font-family: system-ui, -apple-system, sans-serif; line-height: 1.5; color: #1a202c; background: #f7fafc; margin: 0; padding: 0; }
        .mfc-preview-container { max-width: 1280px; margin: 0 auto; padding: 2rem; }
        .mfc-preview-row { display: flex; flex-wrap: wrap; margin: 0 -1rem; }
        .mfc-preview-sidebar-column { width: 100%; padding: 0 1rem; margin-bottom: 2rem; }
        @media (min-width: 1024px) { .mfc-preview-sidebar-column { width: 25%; margin-bottom: 0; } }
        .mfc-preview-content-column { width: 100%; padding: 0 1rem; }
        @media (min-width: 1024px) { .mfc-preview-content-column { width: 75%; } }
        .mfc-preview-sidebar-list { list-style: none; padding: 0; margin: 0; }
        .mfc-preview-sidebar-item { display: block; padding: 0.5rem 0.75rem; color: #4a5568; text-decoration: none; border-radius: 0.375rem; }
        .mfc-preview-sidebar-item:hover { background: #edf2f7; color: #2d3748; }
        .mfc-preview-sidebar-item.mfc-active { background: #e2e8f0; color: #1a202c; font-weight: 600; }
        .mfc-preview-section { margin-bottom: 3rem; background: #fff; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); }
        .mfc-preview-page-title { font-size: 1.875rem; font-weight: 700; margin-bottom: 2rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1rem; }
        .mfc-preview-section-title { font-size: 1.5rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; }
        .mfc-preview-example { border: 1px solid #e2e8f0; border-radius: 0.5rem; margin-bottom: 1.5rem; overflow: hidden; }
        .mfc-preview-example-body { padding: 1.5rem; }
        .mfc-preview-example-code { background: #2d3748; color: #edf2f7; padding: 1rem; overflow-x: auto; }
        
        .mfc-framework-switcher { margin-bottom: 2rem; padding: 1rem; background: #fff; border-radius: 0.5rem; border: 1px solid #e2e8f0; }
        .mfc-framework-switcher label { display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #718096; margin-bottom: 0.5rem; }
        .mfc-framework-switcher select { width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; background-color: #fff; }
    </style>
</head>
<body class="{{ theme_class('preview_body') }}">
    <x-form-assets />
    <x-form::local-package-badge/>

    <div class="{{ theme_class('preview_container') }}">
        <div class="mfc-framework-switcher">
            <label for="mfc-framework-switcher">Framework</label>
            <select id="mfc-framework-switcher" onchange="window.location.href = '?framework=' + this.value">
                @foreach($themes as $t)
                    <option value="{{ $t }}" {{ $framework === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                @endforeach
            </select>
        </div>

        <div class="{{ theme_class('preview_row') }}">
            <!-- Sidebar -->
            <div class="{{ theme_class('preview_sidebar_column') }}">
                <div class="preview-sidebar">
                    <div class="{{ theme_class('preview_sidebar_list') }}">
                        @foreach($sections as $section)
                            <a href="#{{ $section['id'] }}" class="{{ theme_class('preview_sidebar_item') }}">
                                {{ $section['title'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="{{ theme_class('preview_content_column') }}">
                <h1 class="{{ theme_class('preview_page_title') }}">Form Components Preview</h1>

                @if($submittedData)
                    <div class="mfc-alert-success mfc-alert mb-4" role="alert" style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 1.25rem; border-radius: 0.25rem;">
                        <h4 style="margin-top: 0; color: inherit;"><i class="bi bi-check-circle-fill me-2"></i>Form Submitted Successfully!</h4>
                        <p>Below is the data that was sent to the server:</p>
                        <hr style="border-top: 1px solid #c3e6cb;">
                        <pre style="background: #2d3748; color: #fff; padding: 1rem; border-radius: 0.25rem;"><code>{{ json_encode($submittedData, JSON_PRETTY_PRINT) }}</code></pre>
                    </div>
                @endif

                @foreach($sections as $section)
                    @include('form::preview.sections.' . str_replace('form-', '', $section['id']))
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
        function copyToClipboard(btn) {
            const code = btn.closest('.preview-example-code').querySelector('code').innerText;
            navigator.clipboard.writeText(code).then(() => {
                const icon = btn.querySelector('i');
                icon.classList.replace('bi-clipboard', 'bi-check-lg');
                setTimeout(() => icon.classList.replace('bi-check-lg', 'bi-clipboard'), 2000);
            });
        }
    </script>
</body>
</html>
