<p align="center"><strong>MLBRGN Laravel Form Components</strong><br/>
Reusable Blade components to build accessible Bootstrap 5 forms with ease.</p>

---

### Key features
- Bootstrap 5 form markup out-of-the-box
- Blade components for `input`, `select`, `textarea`, `checkbox`, `radio`, `label`, `group`, `button`, `submit`
- `form` wrapper with configurable client- or server-side validation modes
- Optional TinyMCE-based `<x-form-html-editor>` component
- Consistent error rendering and feedback helpers
- Data binding helpers with `@bind` / `@endbind`
- Publishable, self-contained JS/CSS assets and auto-loader
- Configurable tag prefix (default: `form` → `<x-form-input />`)

This package is a focused adaptation of the excellent work by Protonemedia, simplified to only support Bootstrap 5 views.

Links
- Getting Started: docs/getting-started.md
- Components Reference: docs/components.md
- Validation: docs/validation.md
- HTML Editor: docs/html-editor.md
- Assets: docs/assets.md
- Configuration: docs/configuration.md
- reCAPTCHA v2: docs/recaptcha-v2.md
- Binding (`@bind`): docs/binding.md

---

## Installation

1. Require the package via Composer:

```bash
composer require mlbrgn/laravel-form-components
```

2. Publish config and assets:

```bash
php artisan vendor:publish --tag=mlbrgn-form-components-config
php artisan vendor:publish --tag=mlbrgn-form-components-assets
```

This publishes:
- Config: `config/form-components.php`
- Public assets: `public/vendor/mlbrgn/laravel-form-components/`

3. (Optional) Configure the tag prefix in `config/form-components.php`:

```php
'tag_prefix' => env('FORM_COMPONENTS_TAG_PREFIX', 'form'),
```

With the default prefix, you’ll use components like `<x-form-input />`, `<x-form-select />`, etc.

## Quick start

In your Blade view:

```blade
<x-form-form action="{{ route('posts.store') }}" method="POST">
    <x-form-group>
        <x-form-label for="title">Title</x-form-label>
        <x-form-input name="title" id="title" required />
        <x-form-errors name="title" />
    </x-form-group>

    <x-form-group>
        <x-form-label for="content">Content</x-form-label>
        <x-form-textarea name="content" id="content" rows="6" />
    </x-form-group>

    <x-form-checkbox name="published" value="1">Publish immediately</x-form-checkbox>

    <x-form-submit>Save</x-form-submit>
</x-form-form>
```

Validation assets are automatically injected when the form’s `validationMode` resolves to a client mode.

## Validation modes

Set on `<x-form-form>` via the `validationMode` attribute, or globally via `config('form-components.default-form-validation-mode')`.

Supported values:
- `server` (default): uses pure server-side validation; disables native browser validation
- `client-default`: enables browser validation and loads minimal client assets
- `client-custom`: disables native browser validation but loads the package’s client-side validation assets/classes

Example:

```blade
<x-form-form method="POST" validationMode="client-default">
    ...
</x-form-form>
```

See docs/validation.md for details.

## HTML editor (TinyMCE)

Use `<x-form-html-editor>` to render a WYSIWYG editor powered by TinyMCE. The component loads the necessary assets via the internal asset loader.

```blade
<x-form-html-editor name="body" label="Body" :tinymce-config="['menubar' => false]" />
```

Global editor options can be set via `form-components.html_editor_tinymce_global_config` in the config file. See docs/html-editor.md.

## Assets

The package includes an asset loader published to `public/vendor/mlbrgn/laravel-form-components`. By default, forms/components pull in what they need. You can also include assets manually:

```blade
<x-mlbrgn-form-components::assets :config="['features' => ['validation' => true, 'htmlEditor' => true]]" />
```

See docs/assets.md for more options.

## Data binding with @bind

Bind a model/array to nested inputs without repeating `value` for each control:

```blade
@bind($post)
    <x-form-input name="title" />
    <x-form-textarea name="content" />
@endbind
```

Use `old()` data and defaults seamlessly. See docs/binding.md for details.

## reCAPTCHA v2

The `<x-form-recaptcha-v2 />` component renders v2 widgets. Configure keys under `form-components.recaptcha.*`. See docs/recaptcha-v2.md.

## Configuration

Open `config/form-components.php` to adjust:
- `framework` (Bootstrap 5 supported)
- `tag_prefix`
- Validation and wrapper-class behavior
- HTML editor global config and content CSS
- reCAPTCHA settings

See docs/configuration.md for the full list.

## Upgrading from protonemedia/laravel-form-components

This package is a streamlined fork focused on Bootstrap 5. Some options and views were removed or renamed. See docs/upgrade.md for guidance.

## Credits

- Based on: https://github.com/protonemedia/laravel-form-components
- Authors: [Evertjan Garretsen, Nick D.](https://github.com/MLBRGN)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Treeware

This package is [Treeware](https://treeware.earth). If you use it in production, then we ask that you [buy the world a tree](https://plant.treeware.earth/pascalbaljetmedia/laravel-form-components) to thank us for our work.
