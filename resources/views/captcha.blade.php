@props([
    'callback',
    'label',
])

<div class="g-recaptcha mb-3"
     data-sitekey="{{ config('services.recaptcha.site-key') }}"
     data-badge="inline"
     data-size="invisible"
     data-callback="{{ $callback }}">
</div>
<button class="btn btn-primary" type="submit">{{ $label }}</button>
