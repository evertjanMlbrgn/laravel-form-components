<x-form::preview.components.section id="form-captcha" title="Captcha" description="Components for reCAPTCHA integration.">
    <div class="mfc-shell-alert mb-4" style="background: #e7f3ff; border: 1px solid #b8daff; color: #004085; padding: 1rem; border-radius: 0.25rem;">
        <i class="bi bi-info-circle-fill me-2" aria-hidden="true"></i>
        <strong>Note:</strong> These components require valid reCAPTCHA site keys in your configuration to function properly.
    </div>

    <x-form::preview.components.example title="Recaptcha V2">
        <x-slot:code_slot>
            @verbatim
<x-form-recaptcha-v2 form-id="demo-form" label="Submit with reCAPTCHA" />
            @endverbatim
        </x-slot:code_slot>
        <x-form-recaptcha-v2 form-id="demo-form" label="Submit with reCAPTCHA" />
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Invisible Captcha">
        <x-slot:code_slot>
            @verbatim
<x-form-captcha label="Submit Invisibly" callback="onCaptchaSubmit" />
            @endverbatim
        </x-slot:code_slot>
        <x-form-captcha label="Submit Invisibly" callback="onCaptchaSubmit" />
        <script>
            function onCaptchaSubmit(token) {
                console.log('Invisible captcha submitted with token:', token);
            }
        </script>
    </x-form::preview.components.example>
</x-form::preview.components.section>
