### HTML editor

The package provides a TinyMCE-backed HTML editor via `<x-form-html-editor>`.

Basic usage:
```blade
<x-form-html-editor
  name="body"
  label="Body"
  :tinymce-config="['menubar' => false]"
  rows="10"
/>
```

Behavior
- Renders a `<textarea>` enhanced by TinyMCE via the package’s asset loader.
- Automatically includes the assets once per page.
- Adds `is-invalid` class when the field has errors and supports client/server feedback messages.

Props (selected)
- `name` (string) – input name
- `label` (string)
- `hidden`, `horizontal`, `floating` – layout helpers
- `validFeedback`, `invalidFeedback`, `tooltipFeedback`, `helpText`
- `tinymce-config` (array|JSON) – per-instance configuration
- `extraFormData` (array) – custom JSON stored on the element as `data-extra-form-data`

Global configuration
Set defaults in `config/form-components.php` under `html_editor_tinymce_global_config`. Example keys:
- `height`, `menubar`, `plugins`, `toolbar`
- `content_css` (defaults to `vendor/mlbrgn/laravel-form-components/css/tiny-mce-content.css`)
- `file_picker_callback`, `images_upload_handler` (hooks)

The view exposes `window.mlbHtmlEditorTinymceConfig` to the page containing the merged global + instance config.
