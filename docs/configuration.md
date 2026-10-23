### Configuration

Publish the config file with:
```bash
php artisan vendor:publish --tag=mlbrgn-form-components-config
```

This creates `config/form-components.php` (source: `config/config.php` in the package). Key options:

- `framework` (string, default `plain`, set via `FORM_COMPONENTS_FRAMEWORK`)
  - Frontend framework / theme. Supported values:
    - `plain` (default): semantic `mfc-*` classes, no CSS framework assumed.
    - `bootstrap-5`: Bootstrap 5 classes.
    - `bootstrap-6`: **provisional** placeholder. Bootstrap 6 is unreleased, so this theme is `array_replace($bootstrap5, [...])` in `config/config.php` and currently inherits every Bootstrap 5 class. Put Bootstrap 6 specific overrides in that array once they are known.
    - `tailwind`: Tailwind CSS utility classes. The provided classes expect the `@tailwindcss/forms` plugin to be enabled in your Tailwind configuration.
    - `daisyui`: DaisyUI (v4) component classes.
  - Bulma is not supported.

### Multi-framework Preview

The package includes a built-in preview UI accessible at `/form-components-preview`. You can switch between different frameworks in the preview by using the `framework` query parameter:

- `/form-components-preview?framework=plain`
- `/form-components-preview?framework=tailwind`
- `/form-components-preview?framework=daisyui`
- `/form-components-preview?framework=bootstrap-5`
- `/form-components-preview?framework=bootstrap-6`

The preview page automatically loads the necessary CSS/JS for each framework via CDN. 
- For `tailwind`, it loads the Tailwind Play CDN with the `forms` plugin enabled.
- For `bootstrap-6`, it currently uses the Bootstrap 5.3.3 CSS.
- For `plain` mode, it uses a minimal preview-only stylesheet so the UI remains usable while the components themselves stay truly plain.

**Important:** When using these themes in your own application, you are responsible for including the appropriate CSS framework assets (Tailwind, Bootstrap, etc.) in your layout. For Tailwind CSS, ensure you have the `@tailwindcss/forms` plugin installed and configured.

- `tag_prefix` (string)
  - Blade tag prefix for public components. Default: `form`.
  - Example: `<x-form-input />` when set to `form`.

- `use_eloquent_date_casting` (bool)
  - Enables support for Eloquent date casting when resolving values.

- `relationship_convert_field_name_to_camelcase_for_relationships` (bool)
  - Controls field name conversion strategy for relationships.

- `use_class_instead_of_disabled_in_select_placeholder` (bool)
  - When `true`, uses a CSS class instead of the `disabled` attribute for select placeholders.

- `tinymce_content_css_path` (string)
  - Optional path to custom content CSS for TinyMCE.

- `use_wrapper_classes` (bool)
  - When `true`, utility classes like `m-*` passed to a component are applied to the wrapper instead of the control via macros.

- `modify_label_class` (bool)
  - When `true`, modifies label class in input-groups to `input-group-text` for proper Bootstrap 5 styling.

- `detect_validation_classes_in_group` (bool)
  - Enables detection of `is-valid`/`is-invalid` classes in `group` components for consistent feedback styling.

- `default-form-validation-mode` (string)
  - One of `server`, `client-default`, `client-custom`.
  - Controls default validation behavior for `<x-form-form>`.

- `recaptcha` (array)
  - `site-key`, `secret-key`
  - `version` (defaults to `v2`)
  - `language` (e.g., `en-GB`)
  - `size` (`compact`, `normal`, `invisible`)
  - `theme` (`light`, `dark`)
  - `tabindex` (int)

- `html_editor_tinymce_global_config` (array)
  - Default TinyMCE options merged with per-instance config.
  - Notable keys: `height`, `menubar`, `plugins`, `toolbar`, `content_css`, `file_picker_callback`, `images_upload_handler`, `image_class_list`, `style_formats`, etc.

- `checkbox.default_to_zero` (bool)
  - When `true`, adds a hidden input with value `0` so unchecked checkboxes submit a value.

- `mfc_using_local_package` (bool)
  - Developer-only flag for local development; ignore in production.

### Publishable assets

Front-end assets are published to `public/vendor/mlbrgn/laravel-form-components` with:
```bash
php artisan vendor:publish --tag=mlbrgn-form-components-assets
```

### Internal view namespace

The package registers internal views under the fixed namespace `mlbrgn-form-components`. You may reference them directly when needed, e.g.:
```blade
<x-mlbrgn-form-components::assets />
```
