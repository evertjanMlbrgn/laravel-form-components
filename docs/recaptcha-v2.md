### reCAPTCHA v2

This package includes a Blade component to integrate Google reCAPTCHA v2 into your forms.

#### Configure keys

Add the following to your `.env` and publish/update your config:
```env
RECAPTCHA_SITE_KEY=your-site-key
RECAPTCHA_SECRET_KEY=your-secret-key
RECAPTCHA_LANGUAGE=en-GB
RECAPTCHA_SIZE=compact   # compact | normal | invisible
RECAPTCHA_THEME=light    # light | dark
RECAPTCHA_TABINDEX=0
```

These map to `config('form-components.recaptcha.*')`.

#### Usage

Render the component inside your form. It will render a submit button that is gated by reCAPTCHA v2.

```blade
<x-form-form id="contact-form" action="..." method="POST">
  <!-- ...your fields... -->

  <x-form-recaptcha-v2
    formId="contact-form"
    classButton="btn-primary"
    label="Send"
  />
</x-form-form>
```

Props
- `formId` (string): the `id` attribute of the `<form>` to hook into.
- `classButton` (string): Bootstrap class for the rendered button (default `btn-primary`).
- `label` (string): button label (default `Submit`).

On the backend, validate the token with Google’s API using your `secret-key` as usual.
