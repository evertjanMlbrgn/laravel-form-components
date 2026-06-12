---
name: laravel-form-components-development
description: Development guidelines for the mlbrgn/laravel-form-components package.
---
# Laravel Form Components Development

## Overview
This package provides reusable Blade components for Bootstrap 5 forms, including data binding, validation helpers, and a TinyMCE-based HTML editor.

## Key Features
- **Data Binding**: Use `@bind($model) ... @endbind` to automatically fill nested components.
- **Validation Modes**: `server` (default), `client-default`, and `client-custom`.
- **Customizable Prefix**: Default is `form` (e.g., `<x-form-input />`).
- **HTML Editor**: `<x-form-html-editor />` powered by TinyMCE.

## Testing
- This package uses **PHPUnit**.
- Run tests from the package root: `vendor/bin/phpunit`.
- Ensure components are tested against Bootstrap 5 markup requirements.

## When to Activate
- Activate when working on form elements, validation logic, or Blade components in this package.
- Activate when modifying the asset loader or the TinyMCE integration.

## Scope
- In scope: Bootstrap 5 form components, data binding, recaptcha v2, TinyMCE editor.
- Out of scope: Other frontend frameworks (Tailwind, etc.), non-Bootstrap styling.

## Do and Don't
Do:
- Use the `form-components.tag_prefix` config for component naming.
- Ensure all components are accessible (ARIA labels, IDs).
- Use `FormDataBinder` for any custom binding logic.

Don't:
- Don't hardcode the `form` prefix in internal views; use the internal namespace `mlbrgn-form-components`.
- Don't add support for non-Bootstrap frameworks (this is a focused fork).

## References
- `docs/components.md`
- `docs/binding.md`
- `docs/validation.md`
