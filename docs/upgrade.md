### Upgrading from protonemedia/laravel-form-components

This package is a streamlined fork that focuses on Bootstrap 5 and introduces a few differences.

Key differences
- Only Bootstrap 5 views are included (no Tailwind/other frameworks).
- Public component tags are configurable via `config('form-components.tag_prefix')`. The default is `form` (e.g., `<x-form-input />`).
- Assets are bundled with an auto-loader component (`<x-mlbrgn-form-components::assets />`) and are auto-included in relevant components.
- HTML editor is powered by TinyMCE with a simplified configuration surface.
- Validation modes are explicit: `server`, `client-default`, `client-custom`.

What to check when upgrading
1. Publish the new config and assets:
   ```bash
   php artisan vendor:publish --tag=mlbrgn-form-components-config
   php artisan vendor:publish --tag=mlbrgn-form-components-assets
   ```
2. Update component tags to use the configured prefix (default: `form`):
   - Example replacements:
     - `<x-input>` → `<x-form-input>`
     - `<x-select>` → `<x-form-select>`
     - `<x-form>` → `<x-form-form>`
3. Verify any custom layouts/styles with Bootstrap 5 markup/classes.
4. If you used a WYSIWYG editor previously, migrate to `<x-form-html-editor>` and configure TinyMCE as needed.
5. If you had custom asset pipelines, remove redundant includes and rely on the package’s asset loader or include it manually.

If you find gaps or missing features compared to the original package, open an issue describing your use case.
