<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Components Preview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
    <style>
        .preview-sidebar {
            height: calc(100vh - 2rem);
            overflow-y: auto;
        }
        pre { margin: 0; }
        .copy-code i { pointer-events: none; }
    </style>
</head>
<body class="{{ theme_class('preview_body') }}">
    <x-form-assets />
    <x-form::local-package-badge/>

    <div class="{{ theme_class('preview_container') }}">
        <div class="{{ theme_class('preview_row') }}">
            <!-- Sidebar -->
            <div class="{{ theme_class('preview_sidebar_column') }}">
                <div class="sticky-top pt-3 preview-sidebar">
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
