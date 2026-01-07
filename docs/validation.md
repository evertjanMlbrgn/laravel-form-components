### Validation

The form component supports three validation modes controlled via the `validationMode` prop or the `default-form-validation-mode` config option.

Modes:
- `server` (default):
  - Adds `novalidate` attribute to the form
  - No client-side validation is performed, rely on Laravel validation and error bags

- `client-default`:
  - Keeps browser’s native validation enabled
  - Loads the package’s minimal validation assets and sets `needs-validation` on the form

- `client-custom`:
  - Adds `novalidate` to disable native validation
  - Loads the package’s custom validation assets and sets `needs-validation`

Usage:
```blade
<x-form-form validationMode="server"> ... </x-form-form>
<x-form-form validationMode="client-default"> ... </x-form-form>
<x-form-form validationMode="client-custom"> ... </x-form-form>
```

Global default:
```php
// config/form-components.php
'default-form-validation-mode' => env('FORM_COMPONENTS_DEFAULT_VALIDATION_MODE', 'server'),
```

The asset loader is automatically included once per page when `client-default` or `client-custom` is used.
