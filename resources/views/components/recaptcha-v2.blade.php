@if(empty($formId))
    <div class="badge bg-danger">
        No form-id provided! This is needed for recaptcha to work!
    </div>
@endif

<div class="g-recaptcha" id="{{ $formId . '-captcha-container' }}"></div>
<x-mlbrgn-form-button class="g-recaptcha-submit-button" type="submit" data-form-id="{{ $formId }}"
    @class([$classButton])
>{{ $label }}</x-mlbrgn-form-button>

@once
    <script>
        let theme = '{{ config('form-components.recaptcha.theme') }}'
        let sitekey = '{{ config('form-components.recaptcha.site-key') }}'
        let size = '{{ config('form-components.recaptcha.size') }}'
        let tabindex = '{{ config('form-components.recaptcha.tabindex') }}'

        function captchaInitialize() {
            console.log('Initializing reCAPTCHA');

            document.querySelectorAll(".g-recaptcha").forEach(recaptchaContainer => {
                grecaptcha.render(recaptchaContainer, {
                    sitekey: sitekey,
                    size: size,
                    theme: theme,
                    callback: onCaptchaResponse,
                    tabindex: tabindex,
                    'expired-callback': onExpired,
                    'error-callback': onError
                });
            });
        }

        function onCaptchaResponse(token) {
            // captcha response received (success)
        }

        function onExpired() {
            console.log('reCAPTCHA expired');
        }

        function onError() {
            console.log('reCAPTCHA error');
        }

    </script>

    <script src="https://www.google.com/recaptcha/api.js?hl={{ config('form-components.recaptcha.language') }}&onload=captchaInitialize&render=explicit" async defer></script>
@endonce
{{--@once--}}
{{--    <x-form-components::assets :config="$assetFeatures()" />--}}
{{--@endonce--}}
