## Laravel Form Components

- `mlbrgn/laravel-form-components` provides a set of reusable Blade components for Laravel forms.
- Always activate the `laravel-form-components-development` skill when working on form elements, validation displays, or layout components.
- **Architecture**: Follow the existing pattern of using data-binding and ensuring components are theme-aware.
- **Tag Prefix**: The default prefix is `form` (e.g., `<x-form-input />`), configurable via `form-components.tag_prefix`.
- **Validation**: Supports `server`, `client-default`, and `client-custom` validation modes.
- **Code Style**: Always run Pint using a subshell from the project root: `(cd packages/mlbrgn/laravel-form-components && vendor/bin/pint --format agent)`.
