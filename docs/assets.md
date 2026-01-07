### Assets

The package ships front-end assets (CSS/JS) that are published to:

`public/vendor/mlbrgn/laravel-form-components`

Publish with:
```bash
php artisan vendor:publish --tag=mlbrgn-form-components-assets
```

#### Automatic inclusion
- `<x-form-form>` automatically injects the Assets component once per page when `validationMode` is `client-default` or `client-custom`.
- `<x-form-html-editor>` automatically injects the Assets component once per page (enabling the `htmlEditor` feature) when used.

#### Manual inclusion
You can include the asset loader yourself and control features:

```blade
<x-mlbrgn-form-components::assets :config="[
  'basePath' => asset('vendor/mlbrgn/laravel-form-components'),
  'features' => [
    'validation' => true,
    'htmlEditor' => true,
  ],
]" />
```

The loader reads the JSON config from a `<script type="application/json" id="mlbrgn-asset-config">` tag and loads:
- Core CSS/JS: `css/index.css`, `js/index.js`
- Validation (when enabled): `css/mlbrgn-form-validation.css`, `js/mlbrgn-form-validation.js`
- HTML editor (when enabled and an element with `data-mlbrgn-html-editor` exists): `css/tiny-mce-content.css`, `js/mlbrgn-html-editor.js`

You normally don’t need to reference these files individually; the loader does it for you.
