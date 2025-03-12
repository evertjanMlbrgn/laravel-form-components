@props([
    'callback',
    'label',
])

{{--The Recaptcha element--}}
<div {{ $attributes->class('g-recaptcha') }}
     data-sitekey="{{ config('recaptcha.site-key') }}"
     data-badge="inline"
     data-size="invisible"
     data-callback="{{ $callback }}">
</div>
{{-- The submit button --}}
<x-mlbrgn-form-submit
    @class([
       $attributes->get('class-button', '') => $attributes->has('class-button')
    ])
    onclick="executeRecaptcha(this)"
>{{ $label }}</x-mlbrgn-form-submit>


@once
    <script src="https://www.google.com/recaptcha/api.js?h1={{ config('recaptcha.language') }}"></script>
    <!-- Add an onload callback -->
    <script>
        function onRecaptchaLoad() {
            // the callback will be called when the api.js is loaded
            console.log("reCAPTCHA API is loaded.");
            alert('test');
        }
    </script>
    <script>
        function executeRecaptcha(event, button) {
            console.log(event);
            alert('trst')
            event.preventDefault();

            let form = button.closest('form');
            let recaptcha = form.querySelector('.g-recaptcha');

            if (recaptcha) {
                grecaptcha.execute(recaptcha.dataset.sitekey);
                form.setAttribute('data-submit', 'true'); // Mark as ready for submission
            }
        }

        function onReCaptchaSuccess(token) {
            let forms = document.querySelectorAll('form[data-submit="true"]');
            forms.forEach(form => {
                form.submit();
                form.removeAttribute('data-submit'); // Reset after submission
            });
        }
    </script>
@endonce

