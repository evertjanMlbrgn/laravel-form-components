@if(empty($formId))
    <div class="badge bg-danger">
        No form-id provided! This is needed for recaptcha to work!
    </div>
@endif
<x-form::button
    @class([$classButton, 'g-recaptcha'])
    data-sitekey="{{ config('form-components.recaptcha.site-key') }}"
    data-callback="onFormSubmit"
    data-form-id="{{ $formId }}">{{ $label }}</x-form::button>

@once
    <script>
        let submitButtonClicked = null;

        document.addEventListener("DOMContentLoaded", function() {
            console.log("reCAPTCHA and callback ready.");

            // Store the last clicked button before reCAPTCHA executes
            document.querySelectorAll(".g-recaptcha").forEach(button => {
                button.addEventListener("click", function() {
                    submitButtonClicked = this;
                });
            });
        });

        function onFormSubmit(token) {
            if (!submitButtonClicked) {
                console.error("submit button not found!");
                return;
            }

            const formId = submitButtonClicked.getAttribute('data-form-id');
            const form = document.getElementById(formId);

            if (form) {
                console.log("Submitting form:", formId);
                form.submit();
            } else {
                console.error("Form not found:", formId);
            }
        }
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endonce
