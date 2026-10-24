@props(['id', 'title', 'description' => null, 'support' => null])
<section id="{{ $id }}" class="mb-5">
    <h2 class="h2">{{ $title }}</h2>
    @if($description)
        <p class="lead mb-4">{!! $description !!}</p>
    @endif

    @if($support && !\Mlbrgn\LaravelFormComponents\Theme\Theme::supports($support))
        <div class="mfc-shell-alert mfc-shell-alert-warning mb-4" role="note">
            <i class="bi bi-exclamation-triangle-fill me-2" aria-hidden="true"></i>
            <strong>Note:</strong> This feature is not natively supported by the <strong>{{ \Mlbrgn\LaravelFormComponents\Theme\Theme::frameworkName() }}</strong> theme. Output below may be unstyled or unchanged.
        </div>
    @endif

    {{ $slot }}
</section>
