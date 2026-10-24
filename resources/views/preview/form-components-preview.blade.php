<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Components Preview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    @php
        $framework = theme_framework();
        $themes = array_keys(config('form-components.themes'));
    @endphp

    @if($framework === 'tailwind')
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

        /* MFC Shell specific classes to avoid collisions with DaisyUI/Tailwind */
        .mfc-shell-card { position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid rgba(0,0,0,.125); border-radius: .25rem; }
        .mfc-shell-card-body { flex: 1 1 auto; padding: 1.25rem; }
        .mfc-shell-card-title { margin-bottom: .75rem; font-weight: 500; line-height: 1.2; }
        .mfc-shell-alert { position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; }
        .mfc-shell-alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .mfc-shell-alert-warning { color: #856404; background-color: #fff3cd; border-color: #ffeeba; }
        .mfc-shell-alert-heading { color: inherit; margin-top: 0; }
        .mfc-shell-btn { display: inline-block; font-weight: 400; text-align: center; vertical-align: middle; cursor: pointer; user-select: none; border: 1px solid transparent; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .25rem; transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out; }
        .mfc-shell-btn-sm { padding: .25rem .5rem; font-size: .875rem; line-height: 1.5; border-radius: .2rem; }
        .mfc-shell-btn-outline-secondary { color: #6c757d; border-color: #6c757d; }
        .mfc-shell-btn-outline-secondary:hover { color: #fff; background-color: #6c757d; border-color: #6c757d; }

        /* Button variants for demo purpose */
        .btn-preview-primary { color: #fff; background-color: #0d6efd; border-color: #0d6efd; }
        .btn-preview-secondary { color: #fff; background-color: #6c757d; border-color: #6c757d; }
        .btn-preview-success { color: #fff; background-color: #198754; border-color: #198754; }
        .btn-preview-outline-primary { color: #0d6efd; border-color: #0d6efd; }
        .btn-preview-outline-primary:hover { color: #fff; background-color: #0d6efd; }
        .btn-preview-outline-secondary { color: #6c757d; border-color: #6c757d; }
        .btn-preview-outline-secondary:hover { color: #fff; background-color: #6c757d; }

        /* Demo grid helpers - mapped to Bootstrap grid for consistent preview */
        .mfc-demo-grid { display: flex; flex-wrap: wrap; margin-right: -0.75rem; margin-left: -0.75rem; }
        .mfc-demo-grid > * { flex-shrink: 0; width: 100%; max-width: 100%; padding-right: 0.75rem; padding-left: 0.75rem; margin-top: 1rem; }
        @media (min-width: 768px) {
            .mfc-demo-col-md-6 { flex: 0 0 auto; width: 50%; }
            .mfc-demo-col-md-4 { flex: 0 0 auto; width: 33.33333333%; }
            .mfc-demo-col-md-2 { flex: 0 0 auto; width: 16.66666667%; }
        }
        .mfc-demo-col-12 { flex: 0 0 auto; width: 100%; }
        .mfc-demo-col-auto { flex: 0 0 auto; width: auto; }
        .mfc-demo-stack > * + * { margin-top: 1rem; }

        /* Minimal Preview styling for Plain theme - only applied to demo content */
        .preview-content.mfc-preview-body { font-family: system-ui, -apple-system, sans-serif; line-height: 1.5; color: #1a202c; background: #f7fafc; }

        /* Sidebar active state */
        #preview-sidebar .nav-link.active {
            color: #0d6efd !important;
            background-color: #f8f9fa;
        }
        #preview-sidebar .nav-link:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="bg-light" data-bs-spy="scroll" data-bs-target="#preview-sidebar" data-bs-offset="0" tabindex="0">
    <x-form-assets />
    <x-form::local-package-badge/>

    <div class="container-fluid py-3 px-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="mfc-shell-card shadow-sm">
                    <div class="mfc-shell-card-body d-flex justify-content-between align-items-center">
                        <h5 class="mfc-shell-card-title mb-0">Form Components Preview</h5>
                        <div class="d-flex align-items-center">
                            <label for="mfc-framework-switcher" class="me-2 text-muted small fw-bold text-uppercase">Framework:</label>
                            <select id="mfc-framework-switcher" class="form-select form-select-sm w-auto" onchange="window.location.href = '?framework=' + this.value">
                                @foreach($themes as $t)
                                    <option value="{{ $t }}" {{ $framework === $t ? 'selected' : '' }}>{{ \Mlbrgn\LaravelFormComponents\Theme\Theme::frameworkName($t) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 d-none d-lg-block">
                <nav id="preview-sidebar" class="nav flex-column sticky-top preview-sidebar shadow-sm bg-white rounded" style="top: 1rem;">
                    @foreach($sections as $section)
                        <a href="#{{ $section['id'] }}" class="nav-link fw-bold text-dark border-bottom">
                            {{ $section['title'] }}
                        </a>
                        @if(isset($section['subsections']))
                            <nav class="nav flex-column ps-3">
                                @foreach($section['subsections'] as $sub)
                                    <a href="#{{ $sub['id'] }}" class="nav-link small py-1 text-muted">
                                        {{ $sub['title'] }}
                                    </a>
                                @endforeach
                            </nav>
                        @endif
                    @endforeach
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                @if($submittedData)
                    <div class="mfc-shell-alert mfc-shell-alert-success mb-4 shadow-sm" role="alert">
                        <h4 class="mfc-shell-alert-heading"><i class="bi bi-check-circle-fill me-2"></i>Form Submitted Successfully!</h4>
                        <p>Below is the data that was sent to the server:</p>
                        <hr>
                        <pre class="bg-dark text-light p-3 rounded shadow-inner"><code>{{ json_encode($submittedData, JSON_PRETTY_PRINT) }}</code></pre>
                    </div>
                @endif

                <div class="preview-content {{ $framework === 'plain' ? 'mfc-preview-body' : '' }} p-4 rounded shadow-sm border">
                    @foreach($sections as $section)
                        @if(!isset($section['subsections']))
                            <div class="mb-5">
                                @include('form::preview.sections.' . str_replace('form-', '', $section['id']))
                            </div>
                        @else
                            <div class="mb-5">
                                <h2 class="h2 border-bottom pb-2" id="{{ $section['id'] }}">{{ $section['title'] }}</h2>
                                @foreach($section['subsections'] as $sub)
                                    <div class="mb-4">
                                        @include('form::preview.sections.' . str_replace('form-', '', $sub['id']))
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
        function copyToClipboard(btn) {
            const code = btn.closest('.preview-example-code-wrapper').querySelector('code').innerText;
            navigator.clipboard.writeText(code).then(() => {
                const icon = btn.querySelector('i');
                icon.classList.replace('bi-clipboard', 'bi-check-lg');
                setTimeout(() => icon.classList.replace('bi-check-lg', 'bi-clipboard'), 2000);
            });
        }
    </script>
</body>
</html>
